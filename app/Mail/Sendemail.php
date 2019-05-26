<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Sendemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $product;
    public $total;

    public function __construct($name, $product, $total)
    {
        $this->name = $name;
        $this->product = $product;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_name = $this->name;
        $e_product = $this->product;
        $e_total = $this->total;
        return $this->view('mail.sendmail', compact('e_product', 'total'))->subject($e_name);
    }
}
