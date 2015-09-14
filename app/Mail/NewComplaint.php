<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Complient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class NewComplaint extends Mailable
{
    use Queueable, SerializesModels;


    protected $complient;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Complient $complient)
    {
        $this->complient = $complient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->complient->subject);

        return $this->markdown('emails.new-complaint')->with(['complient' => $this->complient]);
    }
}
