<?php

namespace App\Mail;

use App\Models\Collaborateur;
use App\Models\Document;
use App\Models\Validation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserNofificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $document;
    protected $complement_subject;
    protected $collaborateur;
    protected $contentHTML;
    protected $validation;

    public function __construct(string $complement_subject,string $contentHTML, Collaborateur $collaborateur,Document $document, Validation $validation = null)
    {
        $this->collaborateur = $collaborateur;
        $this->complement_subject = $complement_subject;
        $this->document = $document;
        $this->contentHTML = $contentHTML;
        $this->validation = $validation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = config('app.name', 'PDD') . ' '. $this->complement_subject;
        return $this->subject($subject)
                    ->markdown('emails.notification', [
                        'collaborateur' => $this->collaborateur,
                        'document' => $this->document,
                        'proprietaire' => $this->document->collaborateur ?? null,
                        'type_document' => $this->document->type_document ?? null,
                        'complement_subject' => $this->complement_subject,
                        'validation' => $this->validation,
                        'content' => $this->contentHTML
                    ]);
    }
}