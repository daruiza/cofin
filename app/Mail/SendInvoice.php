<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The object instance.
     *
     * @var Object
     */
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Object $object)
    {
        $this->data = $object;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data->from)
            ->markdown('emails.invoices.shipped')
            ->with(['data' => $this->data]);
    }
}
