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
use App\Http\Controllers\PruebaController;


class RedsysController extends Controller
{
    public function notification(Request $request)
    {
        $key = config('redsys.key');
        $parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
        $DsResponse = $parameters["Ds_Response"] + 0;

        if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {
            // Confirmación positiva
            return response('OK', 200);
        } else {
            // Confirmación negativa
            return response('KO', 400);
        }
    }

    public function success(Request $request)
{
    // Obtener el usuario logueado
    $user = Auth::user();

    // Verificar que el usuario esté autenticado
    if (!$user) {
        return back()->with('error', 'Usuario no autenticado');
    }

    // Definir variables para la compra
    $description = $request->input('nombre_prueba') . ' ' . implode(' ', $request->input('fechas', []));
    $amount = number_format($request->input('total') / 100, 2, ',', '.') . ' €'; // Convertir a euros
    $order = time(); // Número de pedido (puedes ajustarlo según sea necesario)

    // Recuperar los datos de las inscripciones desde la sesión
    $inscripcionesData = session('inscripcionesData', []); // Recuperar de sesión (vacío si no existe)

    // Verificar que los datos están disponibles
    if (empty($inscripcionesData)) {
        return back()->with('error', 'No se encontraron datos de inscripciones.');
    }

    // Enviar correo al usuario
    Mail::to($user->email)->send(new PurchaseSuccessfulMail($user->name, $description, $amount, $order, $inscripcionesData));

    // Enviar correo al administrador
    $adminEmail = 'vaserweb.ok@gmail.com'; // Cambiar por el correo del administrador
    Mail::to($adminEmail)->send(new AdminNotificationMail($user->name, $description, $amount, $order, $inscripcionesData));

    // Mostrar vista de éxito al cliente
    return view('redsys.success', compact('description', 'amount', 'order', 'inscripcionesData'));
}




    public function failure()
    {
        return view('redsys.failure'); // Crea una vista para mostrar al cliente
    }

    public function process(Request $request)
{
    try {
        Log::debug('Datos recibidos desde confirmar.blade.php:', $request->all());

        $key = config('redsys.key');
        $merchantCode = config('redsys.merchantcode');
        $terminal = config('redsys.terminal');
        $environment = config('redsys.environment');

        $amount = $request->input('total'); // Total en céntimos
        $order = time(); // Número de pedido único
        $detalle = $request->input('detalle'); // Detalle de los productos

        // Decodificar el detalle (el JSON enviado desde el formulario)
        $detalleArray = json_decode($detalle, true);
        Log::debug('Detalle decodificado:', ['detalle' => $detalleArray]);

        // Verificar que el detalle se haya decodificado correctamente
        if ($detalleArray === null) {
            throw new \Exception('El detalle no tiene un formato JSON válido');
        }

        // Crear descripción de las inscripciones
        $description = '';
        $lastPerro = '';
        $lastPrueba = '';
        $fechas = [];

        // Almacenar los datos del formulario en una variable (array)
        $inscripcionesData = [];

        foreach ($detalleArray as $item) {
            $nombrePerro = $item['perro'] ?? 'Perro no especificado';
            $nombrePrueba = $item['prueba'] ?? 'Prueba no especificada';
            $pruebaSegment = explode(' - ', $nombrePrueba)[1] ?? 'Prueba no especificada';
            $fecha = $item['fecha'] ?? 'Fecha no especificada';

            // Almacenar cada inscripción en el array
            $inscripcionesData[] = [
                'perro' => $nombrePerro,
                'prueba' => $nombrePrueba,
                'fecha' => $fecha,
                'valor' => $item['valor'] ?? 'Valor no especificado',
            ];

            // Construir la descripción
            if ($nombrePerro === $lastPerro && $pruebaSegment === $lastPrueba) {
                $fechas[] = $fecha;
            } else {
                if (!empty($fechas)) {
                    $description .= $lastPerro . ' - ' . $lastPrueba . ' - ' . implode(' - ', $fechas) . "\n";
                }
                $lastPerro = $nombrePerro;
                $lastPrueba = $pruebaSegment;
                $fechas = [$fecha]; 
            }
        }

        // Añadir la última entrada
        if (!empty($fechas)) {
            $description .= $lastPerro . ' - ' . $lastPrueba . ' - ' . implode(' - ', $fechas) . "\n";
        }

        Log::debug('Descripción generada para Redsys:', ['description' => $description]);

        // Almacenar los datos de las inscripciones en la sesión
        session(['inscripcionesData' => $inscripcionesData]);

        // Configurar Redsys para el pago
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
        Redsys::setenvironment($environment);

        // Generar firma y formulario de pago
        $signature = Redsys::generateMerchantSignature($key);
        Redsys::setMerchantSignature($signature);
        $form = Redsys::createForm();

    } catch (\Exception $e) {
        return back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
    }

    // Redirigir a la vista con el formulario
    return view('redsys.form', compact('form'));
}



    
}