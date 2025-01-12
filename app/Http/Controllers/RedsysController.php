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

        $key = config('redsys.key');
        $merchantCode = config('redsys.merchantcode');
        $terminal = config('redsys.terminal');
        $enviroment = config('redsys.enviroment');

        // Datos del pedido
        $amount = $request->input('total'); // Convertimos a céntimos
        $order = time(); // Usamos timestamp como número de pedido
        $detalle = $request->input('detalle'); // Detalle de los productos o servicios

        // Decodificar el detalle si es un JSON
        $detalleArray = json_decode($detalle, true);
        Log::debug('Detalle decodificado:', ['detalle' => $detalleArray]);

        // Verificar que el detalle se haya decodificado correctamente
        if ($detalleArray === null) {
            throw new \Exception('El detalle no tiene un formato JSON válido');
        }

        // Procesar las fechas
        $fechas = [];
        foreach ($detalleArray as $item) {
            if (isset($item['fecha'])) {
                $fechas[] = $item['fecha'];
            }
        }

        // Si no es un array, tratamos de convertirlo a uno
        if (!is_array($fechas)) {
            $fechas = explode(',', $fechas); // Suponiendo que las fechas vienen separadas por comas
        }

        // Ahora unimos las fechas con un espacio entre ellas
        $fechasConcatenadas = implode(' ', $fechas);

        // Añadir el nombre del perro y mantener la descripción como estaba antes
        $nombrePerro = $detalleArray[0]['perro'] ?? 'Perro no especificado'; // Tomar el nombre del primer perro
        $nombrePrueba = $request->input('nombre_prueba', 'Prueba no especificada');

        // Descripción como estaba antes, pero añadiendo el perro al inicio
        $description = "Perro: $nombrePerro - Inscripción para $nombrePrueba $fechasConcatenadas";

        Log::debug('Descripción generada para Redsys:', ['description' => $description]);

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
