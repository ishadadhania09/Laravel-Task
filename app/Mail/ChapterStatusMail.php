<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChapterStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $chapter;
    
    public function __construct($chapter)
    {
        $this->chapter=$chapter;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Chapter Status Mail',
        );
    }

    /**
     * Get the message content definition.
     */

    public function build()
    {
        return $this->view('email.chapter')
                    ->subject('Chapter Status Changed');
    }
}
