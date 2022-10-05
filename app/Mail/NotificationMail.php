<?php

namespace App\Mail;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (isset($this->details['file'])) {
            return $this->from(env('MAIL_FROM_ADDRESS'))
                ->attachFromStorage(storage_path('app' . DIRECTORY_SEPARATOR . $this->details['file']), Str::of($this->details['file'])->basename(), [], 'inline')
                ->view('emails.notification')
                ->with([
                    'details' => $this->details,
                ]);
        } else {
            return $this->from(env('MAIL_FROM_ADDRESS'))
                ->view('emails.notification')
                ->with([
                    'details' => $this->details,
                ]);
        }
    }
}
