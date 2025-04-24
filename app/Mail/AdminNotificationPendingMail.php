<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotificationPendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $total;
    public $order;
    public $inscripcionesData;

    public function __construct($userName, $total, $order, $inscripcionesData)
    {
        $this->userName = $userName;
        $this->total = $total;
        $this->order = $order;
        $this->inscripcionesData = $inscripcionesData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Inscripción con Pago Pendiente',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_notification_pending',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}