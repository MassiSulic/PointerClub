<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PurchaseSuccessfulMail extends Mailable
{
    use Queueable, SerializesModels;

    // Variables para los datos del correo
    public $userName;
    public $description;
    public $amount;
    public $order;
    public $detalle;

    /**
     * Create a new message instance.
     *
     * @param string $userName
     * @param string $description
     * @param float $amount
     * @param string $order
     * @param string $detalle
     */
    public function __construct($userName, $description, $amount, $order, $detalle)
    {
        if (empty($detalle)) {
            Log::debug('Detalle vacío recibido en el correo');
        }

        // Asignamos los datos recibidos al objeto
        $this->userName = $userName;
        $this->description = $description;
        $this->amount = $amount;
        $this->order = $order;
        $this->detalle = $detalle;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Establecemos el asunto del correo
        return new Envelope(
            subject: 'Confirmación de Compra',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Usamos una vista de Blade para el contenido del correo
        return new Content(
            view: 'emails.purchase_successful', // La vista de Blade que creamos
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // No es necesario agregar archivos adjuntos en este caso
        return [];
    }
}
