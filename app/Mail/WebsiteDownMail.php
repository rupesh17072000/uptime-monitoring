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

    public function __construct(Website $website){
        $this->website=$website;
    }
    public function build(){
        return $this->subject("{$this->website->url} is currently down!")
        ->view('emails.website-down');
    }
}
