<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DC3Notification extends Mailable
{
    use Queueable, SerializesModels;
    protected $archivo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $archivo )
    {
        $this->archivo = $archivo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->markdown('emails.DC3Notification')
        ->with([
            'name' => 'Manuel',
        ])
        ->subject('DC3 Notificacion')
        ->attach( $this->archivo->path(), [
            'as' => 'dc3.zip',
            'mime' => 'application/zip',
        ]);
    }
}
