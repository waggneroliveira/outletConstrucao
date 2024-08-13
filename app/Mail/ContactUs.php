<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    private $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->request->name.' - Contato pelo site');
        $this->to('contato@daducha.com.br', $this->request->name);
        // $this->to('anderson@hoom.com.br', $this->request->name);

        return $this->view('mail.ContactUs',[
            'request' => $this->request
        ]);
    }
}
