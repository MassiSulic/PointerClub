<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ssheduardo\Redsys\Facades\Redsys;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseSuccessfulMail;
use App\Mail\AdminNotificationMail;

class RedsysController extends Controller
{
    public function notification(Request $request)
    {
        $key = config('redsys.key');
        $parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
        $DsResponse = $parameters["Ds_Response"] + 0;

        // Log para ver los parámetros recibidos en la notificación
        Log::debug('Datos recibidos en la notificación:', $request->all());
        Log::debug('Parámetros de Redsys:', $parameters);
        Log::debug('Ds_Response:', $DsResponse);

        if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {
            Log::debug('Confirmación positiva de pago');
            return response('OK', 200);
        } else {
            Log::debug('Confirmación negativa de pago');
            return response('KO', 400);
        }
    }

    public function success(Request $request)
{
    try {
        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'Usuario no autenticado');
        }

        $description = $request->input('nombre_prueba') . ' ' . implode(' ', $request->input('fechas', []));
        $amount = number_format($request->input('total') / 100, 2, ',', '.') . ' €';
        $order = time();

        $inscripcionesData = session('inscripcionesData', []);

        if (empty($inscripcionesData)) {
            Log::error('No se encontraron datos de inscripciones en la sesión.');
            return back()->with('error', 'No se encontraron datos de inscripciones.');
        }

        // Log antes de procesar los datos
        Log::debug('Método success - Datos originales de inscripciones:', $inscripcionesData);

        // Validar y normalizar los datos de inscripciones
        $inscripcionesData = array_map(function ($inscripcion) {
            return [
                'perro' => $inscripcion['perro'] ?? 'No especificado',
                'prueba' => $inscripcion['prueba'] ?? 'Prueba no especificada',
                'fecha' => $inscripcion['fecha'] ?? 'Fecha no especificada',
                'valor' => isset($inscripcion['valor']) && is_numeric($inscripcion['valor'])
                    ? (float) $inscripcion['valor']
                    : 0, // Valor predeterminado si es inválido
            ];
        }, $inscripcionesData);

        // Log de datos normalizados
        Log::debug('Método success - Datos normalizados de inscripciones:', $inscripcionesData);

        // Validar el monto total
        $totalCalculated = array_sum(array_column($inscripcionesData, 'valor'));
        if ($totalCalculated <= 0) {
            Log::error('El total calculado de las inscripciones es inválido:', ['totalCalculated' => $totalCalculated]);
            return back()->with('error', 'El total calculado de las inscripciones es inválido.');
        }

        // Enviar correos
        Mail::to($user->email)->send(new PurchaseSuccessfulMail($user->name, $description, $amount, $order, $inscripcionesData));
        $adminEmail = 'info@pointerclubespana.es';
        Mail::to($adminEmail)->send(new AdminNotificationMail($user->name, $description, $amount, $order, $inscripcionesData));

        // Log de correos enviados
        Log::info('Correos enviados correctamente.', ['userEmail' => $user->email, 'adminEmail' => $adminEmail]);

        return view('redsys.success', compact('description', 'amount', 'order', 'inscripcionesData'));

    } catch (\Exception $e) {
        // Log de errores
        Log::error('Error en el método success:', ['error' => $e->getMessage()]);
        return back()->with('error', 'Ocurrió un error procesando la solicitud. Por favor, intente de nuevo.');
    }
}


    public function failure()
    {
        return view('redsys.failure');
    }

    public function process(Request $request)
{
    try {
        // Log de datos iniciales recibidos
        Log::debug('Método process - Datos recibidos desde confirmar.blade.php:', $request->all());

        // Configuración de Redsys
        $key = config('redsys.key');
        $merchantCode = config('redsys.merchantcode');
        $terminal = config('redsys.terminal');
        $environment = config('redsys.environment');

        $amount = $request->input('total');
        $order = time();
        $detalle = $request->input('detalle');

        // Decodificar el detalle y verificar su formato
        $detalleArray = json_decode($detalle, true);
        Log::debug('Detalle decodificado:', ['detalle' => $detalleArray]);

        if ($detalleArray === null) {
            throw new \Exception('El detalle no tiene un formato JSON válido');
        }

        // Inicializar variables para generar la descripción
        $description = '';
        $lastPerro = '';
        $lastPrueba = '';
        $fechas = [];
        $inscripcionesData = [];

        // Procesar cada inscripción y construir la descripción
        foreach ($detalleArray as $item) {
            $nombrePerro = $item['perro'] ?? 'Perro no especificado';
            $nombrePrueba = $item['prueba'] ?? 'Prueba no especificada';
            $pruebaSegment = explode(' - ', $nombrePrueba)[1] ?? 'Prueba no especificada';
            $fecha = $item['fecha'] ?? 'Fecha no especificada';

            // Validar y asignar el valor correctamente
            $valor = isset($item['valor']) && is_numeric($item['valor'])
                ? (float)$item['valor']
                : throw new \Exception('Valor inválido o no definido en una inscripción');

            // Registrar cada inscripción en los datos para la sesión
            $inscripcionesData[] = [
                'perro' => $nombrePerro,
                'prueba' => $nombrePrueba,
                'fecha' => $fecha,
                'valor' => $valor,
            ];

            // Generar descripción agrupando fechas similares
            if ($nombrePerro === $lastPerro && $pruebaSegment === $lastPrueba) {
                $fechas[] = $fecha;
            } else {
                if (!empty($fechas)) {
                    $description .= $lastPerro . ' - ' . $lastPrueba . ' - ' . implode(' - ', $fechas) . '. ';
                }
                $lastPerro = $nombrePerro;
                $lastPrueba = $pruebaSegment;
                $fechas = [$fecha];
            }
        }

        // Agregar la última agrupación a la descripción
        if (!empty($fechas)) {
            $description .= $lastPerro . ' - ' . $lastPrueba . ' - ' . implode(' - ', $fechas) . '. ';
        }

        // Eliminar caracteres de salto de línea
        $description = str_replace(["\n", "\r"], '', $description);

        // Log después de procesar las inscripciones
        Log::debug('Método process - Inscripciones procesadas:', $inscripcionesData);

        // Guardar inscripciones en la sesión
        session(['inscripcionesData' => $inscripcionesData]);

        // Configurar parámetros para Redsys
        Redsys::setAmount($amount);
        Redsys::setOrder($order);
        Redsys::setMerchantcode($merchantCode);
        Redsys::setCurrency('978');
        Redsys::setTransactiontype('0');
        Redsys::setTerminal($terminal);
        Redsys::setMethod('T');
        Redsys::setNotification(config('redsys.url_notification'));
        Redsys::setUrlOk(config('redsys.url_ok'));
        Redsys::setUrlKo(config('redsys.url_ko'));
        Redsys::setVersion('HMAC_SHA256_V1');
        Redsys::setTradeName(config('redsys.tradename'));
        Redsys::setProductDescription($description);
        Redsys::setEnvironment($environment);
        Redsys::setTradeName('POINTER CLUB ESPANOL');
        Redsys::setTitular('Ruddy Wasser');

        // Log de parámetros configurados
        Log::debug('Parámetros para la firma:', [
            'amount' => $amount,
            'order' => $order,
            'merchantCode' => $merchantCode,
            'currency' => '978',
            'transactionType' => '0',
            'terminal' => $terminal,
            'description' => $description,
            'notificationUrl' => config('redsys.url_notification'),
        ]);

        // Generar firma y registrar en el log
        $signature = Redsys::generateMerchantSignature($key);
        Log::debug('Firma generada para Redsys:', ['signature' => $signature]);

        // Generar el formulario y registrar en el log
        Redsys::setMerchantSignature($signature);
        $form = Redsys::createForm();
        Log::debug('Formulario generado para Redsys:', ['form' => $form]);

    } catch (\Exception $e) {
        // Manejo de errores y registro
        Log::error('Error al procesar el pago:', ['error' => $e->getMessage()]);
        return back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
    }

    // Retornar la vista con el formulario
    return view('redsys.form', compact('form'));
}

}