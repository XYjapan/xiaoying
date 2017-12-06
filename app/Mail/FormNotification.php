<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('zhou.guangsheng@everelite.com')
                    ->subject('表单提交提醒')
                    ->with([
                        'alias' =>  config('mail.formKey_alias'),
                    ])
                    ->markdown('emails.formNotification');
    }
}
