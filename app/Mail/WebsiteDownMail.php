<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Website;
use Illuminate\Mail\Mailable;


class WebsiteDownMail extends Mailable
{
    use Queueable, SerializesModels;
    public Website $website;

    public function __construct(Website $website)
    {
        $this->website=$website;
    }

    public function build()
    {
        return $this->subject("{$this->website->url} is down!")
        ->view('emails.website-down');
    }

    // /**
    //  * Create a new message instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Website Down Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
