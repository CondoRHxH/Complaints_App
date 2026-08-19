<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reclamation',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     // return new Content(
    //     //     view: 'mail.hello',
    //     // );
    //     $siteUrl = 'https://votresite.com'; // Remplacez cela par l'URL réelle de votre site
    //     $content = new Content(
    //         view: 'mail.hello'
    //     );
    //     $content->with('siteUrl', $siteUrl);
    //     return $content;
    // }
    // {
        protected $siteUrl;

    public function __construct()
    {
        $this->siteUrl = route('dashboard'); // Replace this with the actual URL of your site
    }

    public function sendMail()
    {
        Mail::to('oussamakobe@gmail.com')->send(new HelloMail($this->siteUrl));
        return redirect()->route('Etudiant.create')->with('message', 'La réclamation a été envoyée.');
    }

    public function content(): Content
    {
        $content = new Content(
            view: 'mail.hello'
        );
        $content->with('siteUrl', $this->siteUrl);
        return $content;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    // public function build()
    // {
    //     return $this->view("mail.hello");
    // }
}
