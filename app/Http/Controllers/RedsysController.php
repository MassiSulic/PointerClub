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
        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'Usuario no autenticado');
        }

        $description = $request->input('nombre_prueba') . ' ' . implode(' ', $request->input('fechas', []));
        $amount = number_format($request->input('total') / 100, 2, ',', '.') . ' €';
        $order = time();

        $inscripcionesData = session('inscripcionesData', []);

        if (empty($inscripcionesData)) {
            return back()->with('error', 'No se encontraron datos de inscripciones.');
        }

        Mail::to($user->email)->send(new PurchaseSuccessfulMail($user->name, $description, $amount, $order, $inscripcionesData));
        $adminEmail = 'vaserweb.ok@gmail.com';
        Mail::to($adminEmail)->send(new AdminNotificationMail($user->name, $description, $amount, $order, $inscripcionesData));

        return view('redsys.success', compact('description', 'amount', 'order', 'inscripcionesData'));
    }

    public function failure()
    {
        return view('redsys.failure');
    }

    public function process(Request $request)
    {
        try {
            Log::debug('Datos recibidos desde confirmar.blade.php:', $request->all());

            $key = config('redsys.key');
            $merchantCode = config('redsys.merchantcode');
            $terminal = config('redsys.terminal');
            $environment = config('redsys.environment');

            $amount = $request->input('total');
            $order = time();
            $detalle = $request->input('detalle');

            $detalleArray = json_decode($detalle, true);
            Log::debug('Detalle decodificado:', ['detalle' => $detalleArray]);

            if ($detalleArray === null) {
                throw new \Exception('El detalle no tiene un formato JSON válido');
            }

            $description = '';
            $lastPerro = '';
            $lastPrueba = '';
            $fechas = [];

            $inscripcionesData = [];
            foreach ($detalleArray as $item) {
                $nombrePerro = $item['perro'] ?? 'Perro no especificado';
                $nombrePrueba = $item['prueba'] ?? 'Prueba no especificada';
                $pruebaSegment = explode(' - ', $nombrePrueba)[1] ?? 'Prueba no especificada';
                $fecha = $item['fecha'] ?? 'Fecha no especificada';

                $description = str_replace(["\n", "\r"], '', $description);

                Log::debug('Descripción generada para Redsys (limpia):', ['description' => $description]);

                $inscripcionesData[] = [
                    'perro' => $nombrePerro,
                    'prueba' => $nombrePrueba,
                    'fecha' => $fecha,
                    'valor' => $item['valor'] ?? 'Valor no especificado',
                ];

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

            if (!empty($fechas)) {
                $description .= $lastPerro . ' - ' . $lastPrueba . ' - ' . implode(' - ', $fechas) . "\n";
            }

            Log::debug('Descripción generada para Redsys:', ['description' => $description]);

            session(['inscripcionesData' => $inscripcionesData]);

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

            $signature = Redsys::generateMerchantSignature($key);
            Log::debug('Firma generada para Redsys:', ['signature' => $signature]);

            Redsys::setMerchantSignature($signature);
            $form = Redsys::createForm();
            Log::debug('Formulario generado para Redsys:', ['form' => $form]);

        } catch (\Exception $e) {
            Log::error('Error al procesar el pago:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }

        return view('redsys.form', compact('form'));
    }
}
