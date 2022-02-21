<?php

namespace App\Listeners;

use App\Events\DocumentsEvent;
use App\Mail\UserNofificationMail;
use App\Models\Document;
use App\Models\DocumentPiece;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class DocumentsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DocumentsEvent  $event
     * @return void
     */
    public function handle(DocumentsEvent $event)
    {
        $name_event = $event->name_event;
        $document = $event->document;

        switch ($name_event) {
            case 'document:soumis': //Notification des membres nouvellement rajouté en tant que membre du projet
                $this->documentSoumis($document);
                break;

            case 'document:transmis': //Notification chef de projet et sponsor du projet
                $this->documentTransmis($document);
                break;

            case 'document:cloture': //Notification soumission projet
                $this->documentCloture($document);
                break;

            default:
                # code...
                break;
        }
    }

    private function notifyListDiffusion(string $complement_subject,string $contentHTML,Document $document) {
        $collaborateurs = $document->list_diffusion;
        if($collaborateurs && count($collaborateurs)) { //Les collaborateurs
            foreach ($collaborateurs as $collaborateur) {
                try {
                    $user = $collaborateur->user;

                    if($user) {
                        Mail::to($user->email)->send(new UserNofificationMail($complement_subject, $contentHTML, $collaborateur, $document, $document->validation_en_cours ?? null));
                    }
                } catch (\Throwable $th) {
                    //dd($th);
                }
            }
        }
    }

    private function notifyValidateur(Document $document) {
        $validation = $document->validation_en_cours;
        if($validation) {
            $complement_subject = "Nouveau dossier à traiter";
            $contentHTML = "Le document <b>".$document->name. "</b> de reférence <mark>". $document->ref ."</mark> vient de vous être soumis pour traitement.";
            if($validation) { //user_IDs
                try {
                    $collaborateur = $validation->collaborateur ?? null;
                    $user = $collaborateur->user ?? null;
    
                    if($user) {
                        Mail::to($user->email)->send(new UserNofificationMail($complement_subject, $contentHTML, $collaborateur, $document, $validation));
                    }
                } catch (\Throwable $th) {
                    //dd($th);
                }
            }
        }
    }

    private function documentSoumis(Document $document) {
        $complement_subject = "Document soumis";
        $contentHTML = "Le document <b>".$document->name. "</b> de reférence <mark>". $document->ref ."</mark> vient d'être soumis par le collaborateur ". $document->collaborateur->nom_complet ?? "--Non défini--" . ".";
        
        // $this->notifyListDiffusion($complement_subject,$contentHTML,$document); //Notifier la liste de diffusion
        $this->documentTransmis($document); //Notifier pour transmission aussi
    }
    
    private function documentTransmis(Document $document) {
        $validation = $document->validation_en_cours;

        if($validation) {
            $complement_subject = "Document transmis";
            $contentHTML = "Le document <b>".$document->name. "</b> de reférence <mark>". $document->ref ."</mark> vient d'être transmis à  ". $validation->collaborateur->nom_complet ?? "--Non défini--" . ".";
            
            $this->notifyListDiffusion($complement_subject,$contentHTML,$document); //Notifier la liste de diffusion
            $this->notifyValidateur($document); //Notifier le validateur suivant
        }
    }

    private function documentCloture(Document $document) {
        $validation = $document->validation_en_cours;

        //Generation du document PDF
        try {
            //code...
            $pdf = App::make('dompdf.wrapper');
            $infos = $document->infos ?? [];
            $document_pieces = $document->document_pieces ?? [];

            $pdf->loadView('documents.pdf', compact("document", 'infos', 'document_pieces'));
            $url = "uploads/document_pieces/{$document->ref}.pdf";
            $pdf->save(public_path($url));

            DocumentPiece::create([
                'name' => "Fiche récapitulative",
                'url' => $url,
                "extension" => "pdf",
                "document_id" => $document->id
            ]);

        } catch (\Throwable $th) {
            //dd($th);
        }

        if($validation) {
            $complement_subject = "Document clôturé";
            $contentHTML = "Le document <b>".$document->name. "</b> de reférence <mark>". $document->ref ."</mark> vient d'être cloturé.";
            
            $this->notifyListDiffusion($complement_subject,$contentHTML,$document); //Notifier la liste de diffusion
            $this->notifyValidateur($document); //Notifier le validateur suivant
        }
    }
}
