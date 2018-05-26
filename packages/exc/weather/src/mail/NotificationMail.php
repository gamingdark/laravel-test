<?php

namespace Exc\Weather\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject;
    public $content;
    public $subscriber_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $subscriber_id)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->subscriber_id = $subscriber_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('excgames@gmail.com')
                    ->subject($this->subject)
                    ->view('weather::email');
    }
}
