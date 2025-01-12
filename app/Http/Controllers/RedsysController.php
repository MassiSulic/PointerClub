<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ssheduardo\Redsys\Facades\Redsys;
use Illuminate\Support\Facades\Log;
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

        if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {
            // Confirmación positiva
            return response('OK', 200);
        } else {
            // Confirmación negativa
            return response('KO', 400);
        }
    }

    // Método que maneja la compra exitosa
    public function success(Request $request)
    {
        // Obtener los detalles de la compra desde el request o base de datos
        $userName = 'Nombre del Usuario'; // Este dato debe ser dinámico, puedes obtenerlo desde la base de datos o request
        $description = 'Descripción de la compra'; // Descripción de la compra realizada
        $amount = $request->input('total'); // Monto de la compra (ajusta según tu estructura de datos)
        $order = time(); // El número de pedido (puedes usar el ID de la compra o el timestamp)

        // Enviar correo al usuario
        Mail::to($request->input('email'))->send(new PurchaseSuccessfulMail($userName, $description, $amount, $order));

        // Enviar correo al administrador
        $adminEmail = 'vaserweb.ok@gmail.com'; // Cambia este correo por el del administrador
        Mail::to($adminEmail)->send(new AdminNotificationMail($userName, $description, $amount, $order));

        // Mostrar vista de éxito al cliente
        return view('redsys.success'); // Aquí se muestra la vista de éxito que debes crear para el cliente
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
        $amount = $request->input('total'); // Convertimos a céntimos
        $order = time(); // Usamos timestamp como número de pedido
        
        
        $fechas = $request->input('fechas');

        // Si no es un array, tratamos de convertirlo a uno
        if (!is_array($fechas)) {
            $fechas = explode(',', $fechas); // Suponiendo que las fechas vienen separadas por comas
        }

        // Ahora unimos las fechas con un espacio entre ellas
        $fechasConcatenadas = implode(' ', $fechas);

        $description = 'Inscripción para la prueba ' . $request->input('nombre_prueba') . ' ' . $fechasConcatenadas;

        
        Log::debug('Redsys Payment Parameters:', [
            'amount' => $amount,
            'order' => $order,
            'merchantCode' => $merchantCode,
            'key' => config('redsys.key'),
            'notification_url' => config('redsys.url_notification'),
            'description' => $description
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
