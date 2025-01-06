<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ssheduardo\Redsys\Facades\Redsys;
use Illuminate\Support\Facades\Log;

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

    public function success()
    {
        return view('redsys.success'); // Crea una vista para mostrar al cliente
    }

    public function failure()
    {
        return view('redsys.failure'); // Crea una vista para mostrar al cliente
    }

    public function process(Request $request)
{
    try {
        $key = config('redsys.key');
        $merchantCode = config('redsys.merchantcode');
        $terminal = config('redsys.terminal');
        $enviroment = config('redsys.enviroment');

        // Datos del pedido
        $amount = $request->input('total') * 100; // Convertimos a céntimos
        $order = time(); // Usamos timestamp como número de pedido
        $description = 'Compra en Pointer Club Español';

        Log::debug('Redsys Payment Parameters:', [
            'amount' => $amount,
            'order' => $order,
            'merchantCode' => $merchantCode,
            'key' => config('redsys.key'),
            'notification_url' => config('redsys.url_notification')
        ]);

        // Configuración de Redsys
        Redsys::setAmount($amount);
        Redsys::setOrder($order);
        Redsys::setMerchantcode($merchantCode);
        Redsys::setCurrency('978'); // Euros
        Redsys::setTransactiontype('0'); // Compra normal
        Redsys::setTerminal($terminal);
        Redsys::setMethod('T'); // Pago con tarjeta
        Redsys::setNotification(config('redsys.url_notification'));
        Redsys::setUrlOk(config('redsys.url_ok'));
        Redsys::setUrlKo(config('redsys.url_ko'));
        Redsys::setVersion('HMAC_SHA256_V1');
        Redsys::setTradeName(config('redsys.tradename'));
        Redsys::setProductDescription($description);
        Redsys::setEnviroment($enviroment);

        // Generar firma
        $signature = Redsys::generateMerchantSignature($key);
        Redsys::setMerchantSignature($signature);

        // Crear el formulario de pago con Redsys
        $form = Redsys::createForm(); // Este es un string HTML

    } catch (\Exception $e) {
        return back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
    }

    // Redirigir a la vista con el formulario (ahora como string)
    return view('redsys.form', compact('form'));
}
}
