<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostStatusNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $status;

    /**
     * Create a new message instance.
     */
    public function __construct($post, $status)
    {
        $this->post = $post;
        $this->status = $status;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = "Thông báo trạng thái bài viết";
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = null;
        if ($this->status == 'pending') {
            $view = 'emails.pending_notify';
        } elseif ($this->status == 'approve') {
            $view = 'emails.approve_notify';
        } elseif ($this->status == 'reject') {
            $view = 'emails.reject_notify';
        }
        return new Content(
            view: $view,
            with: [
                'post' => $this->post
            ],
        );
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
}
