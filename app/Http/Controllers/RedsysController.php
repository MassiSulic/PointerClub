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
    // Obtener el usuario logueado
    $user = Auth::user();

    // Verificar que el usuario esté autenticado
    if (!$user) {
        return back()->with('error', 'Usuario no autenticado');
    }

    $userName = $user->name; // Nombre del usuario logueado
    $userEmail = $user->email; // Email del usuario logueado
    $description = $request->input('nombre_prueba') . ' ' . implode(' ', $request->input('fechas', []));
    $amount = number_format($request->input('total') / 100, 2, ',', '.') . ' €'; // Convertir a euros
    $order = time(); // Número de pedido (puedes ajustarlo según sea necesario)

    // Enviar correo al usuario logueado
    Mail::to($userEmail)->send(new PurchaseSuccessfulMail($userName, $description, $amount, $order));

    // Enviar correo al administrador
    $adminEmail = 'vaserweb.ok@gmail.com'; // Cambiar por el correo del administrador
    Mail::to($adminEmail)->send(new AdminNotificationMail($userName, $description, $amount, $order));

    // Mostrar vista de éxito al cliente
    return view('redsys.success');
}

    public function failure()
    {
        return view('redsys.failure'); // Crea una vista para mostrar al cliente
    }

    public function process(Request $request)
{
    try {
        // Log para inspeccionar los datos recibidos
        Log::debug('Datos recibidos desde confirmar.blade.php:', $request->all());

        // Validación básica de entradas
        $request->validate([
            'total' => 'required|numeric',
            'detalle' => 'required',
            'fechas' => 'nullable', // Puede estar vacío
            'nombre_prueba' => 'required|string'
        ]);

        // Configuración inicial de Redsys
        $key = config('redsys.key');
        $merchantCode = config('redsys.merchantcode');
        $terminal = config('redsys.terminal');
        $enviroment = config('redsys.enviroment');

        // Datos del pedido
        $amount = $request->input('total'); // Cantidad total
        $order = time(); // Usamos timestamp como número de pedido
        $detalle = $request->input('detalle');
        Log::debug('Detalle enviado:', ['detalle' => $detalle]);

        // Manejo de fechas
        $fechas = $request->input('fechas');
        if ($fechas) {
            if (!is_array($fechas)) {
                $fechas = explode(',', $fechas); // Convertir a array si es una cadena
            }
            // Limpieza de las fechas (quitar espacios y validar formato)
            $fechas = array_map('trim', $fechas);
            $fechas = array_filter($fechas, function ($fecha) {
                return \DateTime::createFromFormat('Y-m-d', $fecha) !== false;
            });

            // Concatenar las fechas con un separador
            $fechasConcatenadas = implode(' ', $fechas);
        } else {
            $fechasConcatenadas = 'Sin fechas especificadas';
        }

        // Descripción del producto
        $nombrePrueba = $request->input('nombre_prueba');
        $description = sprintf(
            'Inscripción para la prueba "%s" %s',
            $nombrePrueba,
            $fechasConcatenadas
        );
        Log::debug('Descripción generada:', ['description' => $description]);

        // Log para depurar los parámetros de Redsys
        Log::debug('Redsys Payment Parameters:', [
            'amount' => $amount,
            'order' => $order,
            'merchantCode' => $merchantCode,
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
        \Log::error('Error al procesar el pago:', ['error' => $e->getMessage()]);
        return back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
    }

    // Redirigir a la vista con el formulario
    return view('redsys.form', compact('form'));
}

}
