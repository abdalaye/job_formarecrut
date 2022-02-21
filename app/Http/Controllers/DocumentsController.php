<?php

namespace App\Http\Controllers;

use App\Events\DocumentsEvent;
use App\Models\Collaborateur;
use App\Models\Document;
use App\Models\DocumentPiece;
use App\Models\TypeDocument;
use App\Models\Validation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DocumentsController extends Controller
{
    public function store() {
        $soumettre = request("soumettre");
        $data = $this->validateData();
        $pieces = request("pieces") ?? [];
        $infos = request("infos") ?? [];


        $document = new Document($data);
        $document->ref = $this->generateCode();


        if($document->save()) {
            $chaine = $document->type_document->chaine_validation ?? null;

            $document->update(['is_libre' => $chaine->is_libre ?? 0]);

            //Enregistrement des pieces Jointes
            $this->saveDocumentPieces($pieces, $document->id, $document->type_document->extensions ?? []);

            //Enregistrement des Infos
            UtilitiesController::saveOrUpdateInfos($document->id, $infos, $document->type_document->extensions ?? []);

            $chaine = $document->type_document->chaine_validation ?? null;

            if($chaine) {
                if(isset($soumettre) && $soumettre) {
                    if(!$chaine->is_libre) {
                        if($this->soumettreDossier(Auth::user()->collaborateur, $document)) {
                            Session::flash('success', 'Votre document a été enregistré et soumis avec succès.');
                            return redirect()->route("mesdocuments.soumis");
                        }
                    } else {
                        return redirect()->route("documents.soumettre", $document->ref);
                    }
                }
            }

            Session::flash('success', 'Votre document a été créé avec succès.');
            return redirect()->route("mesdocuments.brouillons");
        } else {
            Session::flash('error', 'L\'enregistrement du document a échoué.');
            return back();
        }
    }

    public function update(Document $document) {
        $soumettre = request("soumettre");
        $data = $this->validateData();
        $pieces = request("pieces") ?? [];
        $infos = request("infos") ?? [];


        if($document->update($data)) {
            //Enregistrement des pieces Jointes
            $this->saveDocumentPieces($pieces, $document->id, $document->type_document->extensions ?? []);

            //Enregistrement des Infos
            UtilitiesController::saveOrUpdateInfos($document->id, $infos, $document->type_document->extensions ?? []);

            $chaine = $document->type_document->chaine_validation ?? null;

            if($chaine) {
                if(isset($soumettre) && $soumettre) {
                    if(!$chaine->is_libre) {
                        if($this->soumettreDossier(Auth::user()->collaborateur, $document)) {
                            Session::flash('success', 'Votre document a été enregistré et soumis avec succès.');
                            return redirect()->route("mesdocuments.soumis");
                        }
                    } else {
                        return redirect()->route("documents.soumettre", $document->ref);
                    }
                }
            }

            Session::flash('success', 'Votre document a été modifié avec succès.');
        } else {
            Session::flash('error', 'La mise à jour du document a échoué.');
        }
        return back();
    }

    public function show($ref) {
        $document = $this->getDocumentByRef($ref);
        $infos = $document->infos ?? [];
        $document_pieces = $document->document_pieces ?? [];

        return view("documents.show", compact("document", 'infos', 'document_pieces'));
    }

    public function consulterDocument($ref) {
        return $this->show($ref);
    }

    public function edit($ref) {
        $collaborateur = Auth::user()->collaborateur;

        $document = $this->getDocumentByRef($ref, $collaborateur->id); //Restriction au collaborateur lii meme

        if($document->statut_document_id != 1) {
            return redirect()->route('documents.consultations.show', $document->ref);
        }

        $typedocument = $document->type_document;
        $fields = $typedocument->fields ?? [];
        $infos = $document->infos ?? [];
        $chaine = $typedocument->chaine_validation;
        $document_pieces = $document->document_pieces;

        if(count($infos)) {
            $fields = UtilitiesController::bindFieldsToInfos($fields, $infos);
        }

        return view("documents.edit", compact("document_pieces","document","typedocument", "chaine", "fields"));
    }

    public function soumettre($ref) {
        $collaborateur = Auth::user()->collaborateur;

        $document = $this->getDocumentByRef($ref, $collaborateur->id); //Restriction au collaborateur lii meme

        if($document->statut_document_id != 1) {
            return redirect()->route('documents.consultations.show', $document->ref);
        }

        if(request()->method() == "PATCH") {
            $tmp = request()->validate(["collaborateur_id" => "required"]);

            //Remove all last Validations
            Validation::where('document_id', $document->id)->delete();

            $validation = Validation::create([
                'document_id' => $document->id,
                'statut_validation_id' => 2,
                'collaborateur_id' => $tmp['collaborateur_id'],
                'rang' => 1,
                'date_reception' => now()
            ]);

            if($validation) {
                if($document->update([
                    'statut_document_id' => 2,
                    "date_publication" => now()
                ])) {
                    //document:soumis
                    event(new DocumentsEvent("document:soumis",$document));
                };


                Session::flash('success', 'Votre document a été enregistré et soumis avec succès.');
                return redirect()->route("mesdocuments.soumis");
            } else {
                Session::flash('error', "Une erreur est survenue au moment de la  génération de votre chaine de transmission.");
            }
        }

        return view("documents.soumettre", compact("document"));
    }

    public function create() {
        $collaborateur = Auth::user()->collaborateur;
        $type_document_id = request()->query("ref");

        if($collaborateur) {
            $type_documents = $collaborateur->authorised_type_documents;
        } else $type_documents = [];

        if(isset($type_document_id)) {
            $typedocument = TypeDocument::findOrFail($type_document_id);
            $chaine = $typedocument->chaine_validation ?? null;
            $fields = $typedocument->fields ?? [];

            $document = new Document([
                "type_document_id" => $type_document_id,
                "statut_document_id" => 1,
                "chaine_validation_id" => $chaine->id,
                "collaborateur_id" => Auth::user()->collaborateur->id ?? null
            ]);

            return view('documents.create', compact("document","type_documents","typedocument", "chaine", "fields"));
        }

        // dd($type_documents);
        return view('documents.create', compact("type_documents"));
    }

    public function brouillons() {
        $title = "Dépôts - Brouillons";
        $documents = [];
        $collaborateur = Auth::user()->collaborateur;
        if(isset($collaborateur)) {
            $documents = Document::where('collaborateur_id', $collaborateur->id)
                                  ->brouillons() //Brouillon
                                  ->get();
        }

        return view('documents.index', compact("documents", "title"));
    }


    public function soumis() {
        $title = "Dépôts - en traitement";
        $documents = [];
        $collaborateur = Auth::user()->collaborateur;
        if(isset($collaborateur)) {
            $documents = Document::where('collaborateur_id', $collaborateur->id)
                                  ->deposes() //En traitement
                                  ->get();
        }

        return view('documents.index', compact("documents", "title"));
    }

    public function clotures() {
        $title = "Documents - Clôturés";
        $documents = [];
        $collaborateur = Auth::user()->collaborateur;
        if(isset($collaborateur)) {
            $documents = Document::where('collaborateur_id', $collaborateur->id)
                                  ->clotures() //>CLotures
                                  ->get();
        }

        return view('documents.index', compact("documents", "title"));
    }

    public function adminDocumentTraitements() {
        $title = "Tous les Documents - en traitement";
        $documents = Document::deposes()->get();

        return view('documents.index', compact("documents", "title"));
    }

    public function adminDocumentClotures() {
        $title = "Tous les Documents - clôturés";
        $documents = Document::clotures()->get();

        return view('documents.index', compact("documents", "title"));
    }

    public function validations() {
        $documents = [];
        $collaborateur = Auth::user()->collaborateur;
        if($collaborateur) {
            $documents = $collaborateur->validations()->where('statut_validation_id', 2)->get()->map(function($validation) {
                return $validation->document;
            });
        }

        return view('documents.validations', compact("documents"));
    }

    public function consultations() {
        $documents = [];
        $collaborateur = Auth::user()->collaborateur;
        if($collaborateur) {
            $type_document_ids = $collaborateur->authorised_consultation_type_document_ids;

            $documents = Document::whereIn('type_document_id', $type_document_ids ?? [])
                        ->orWhere('collaborateur_id', $collaborateur->id)
                        ->deposes()
                        ->get();

           // $documents = Document::where('statut_document_id','=', 3)->get();
        }
        return view('documents.consultation_document_by_type', compact("documents"));
    }

    public function typeDocuments(){
        $type_documents = [];
        $collaborateur = Auth::user()->collaborateur;
        if($collaborateur) {
            $type_document_ids = $collaborateur->authorised_consultation_type_document_ids;

            $type_documents = TypeDocument::whereIn('id', $type_document_ids)->with(['documents' => function($doc) {
                return $doc->clotures()->get();
            }])->get();
        }
        return view('documents.consultations', compact("type_documents"));
    }

    public function consultationByTypeDocument($type_document_id){
        $collaborateur = Auth::user()->collaborateur;
        if($collaborateur) {
            $documents = Document::whereIn('type_document_id',$collaborateur->authorised_consultation_type_document_ids)->where('type_document_id', $type_document_id)->clotures()->get();
        } else $documents = [];

        return view('documents.consultation_document_by_type', compact("documents"));
    }

    protected function validateData() {
        return request()->validate([
            "name" => "required",
            "collaborateur_id" => "required",
            "statut_document_id" => "required",
            "type_document_id" => "required",
            "chaine_validation_id" => "required",
            "description" => "nullable",
        ]);
    }

    private function generateCode() {
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        return $unique = $rand . '-' . $today;
    }

    private function saveDocumentPieces($array, $document_id, $extensions) {
        if(count($array)) {
            foreach ($array as $tmp_piece) {
                $ext = $tmp_piece['file']->extension();
                $uploadFile = UtilitiesController::uploadFile($tmp_piece['file'],"uploads/document_pieces", $extensions);
                if($uploadFile) {
                    DocumentPiece::create([
                        'name' => $tmp_piece['name'],
                        'url' => $uploadFile,
                        'extension' => $ext,
                        'document_id' => $document_id
                    ]);
                }
            }
        }
    }

    private function getDocumentByRef($ref, $collaborateur_id =false) {
        $document_q = Document::where('ref', $ref);

        if($collaborateur_id) {
            $document_q->where('collaborateur_id', $collaborateur_id);
        }

        return $document_q->with([
                    'chaine_validation',
                    'statut_document',
                    'document_pieces',
                    'type_document.fields',
                    'infos'
                ])
                ->firstOrFail();
    }

    private function generateChaineValidations(Collaborateur $collaborateur,Document $document) {
        $type_document = $document->type_document ?? null;
        if($type_document) {
            $chaine = $type_document->chaine_validation ?? null;
            if($chaine) {
                $ligne_chaines = $chaine->ligne_chaines ?? [];
                if(!$chaine->is_libre) {
                    if($chaine->include_managers) {
                        // if($collaborateur->has_managers) {
                            $array_managers = $collaborateur->array_managers;
                            $n = count($array_managers);
                            try {
                                //Remove all last Validations
                                Validation::where('document_id', $document->id)->delete();
                                if($n > 0) {
                                    $this->generateManagerValidations($collaborateur, $document->id, $array_managers);
                                }
                                // dd($collaborateur);

                                $generated = $this->generateLigneValidations($document->id, $ligne_chaines, $n);
                                return !$generated && $n == 0 ? false : true;
                            } catch (\Throwable $th) {
                                // dd($th);
                                return false;
                            }
                        // }
                        // else return "missed_managers";
                    } else {
                        try {
                            $generated = $this->generateLigneValidations($document->id, $ligne_chaines);
                            return $generated;
                        } catch (\Throwable $th) {
                            return false;
                        }
                    }
                }
            }
        }

        return false;
    }

    protected function generateLigneValidations($document_id, $ligne_chaines = null, $begin = 0) {
        if(count($ligne_chaines)) {
            foreach ($ligne_chaines as $ligne) {
                Validation::create([
                    'document_id' => $document_id,
                    'statut_validation_id' => 1,
                    'collaborateur_id' => $ligne->collaborateur_id,
                    'rang' => $begin + $ligne->rang,
                ]);
            }
            return true;
        } else {
            return false;
        }
    }

    protected function generateManagerValidations(Collaborateur $collaborateur, $document_id, $array_managers = []) {
        for ($i=0; $i < count($array_managers); $i++) {
            Validation::create([
                'document_id' => $document_id,
                'statut_validation_id' => 1,
                'collaborateur_id' => $collaborateur->manager_."{$array_managers[$i]}",
                'rang' => ($i + 1),
            ]);
        }
    }

    protected function soumettreDossier(Collaborateur $collaborateur, Document $document) {
        $generateValidations = $this->generateChaineValidations($collaborateur,$document);
        if($generateValidations) {
            if($generateValidations === "missed_managers") {
                Session::flash('error', "Vos managers (n+1 - n+3) ne sont pas définis, veuillez contacter l'administrateur pour vous les définir.");
            } else {
                if($document->update([
                    'statut_document_id' => 2,
                    "date_publication" => now()
                ])) {
                    //document:soumis
                    event(new DocumentsEvent("document:soumis",$document));
                };
                //Mise à jour Validation suivante
                $validation = $document->validations()->where("rang",1)->first();
                $validation->update(['statut_validation_id' => 2, 'date_reception' => now()]);

                return true;
            }
        } else {
            Session::flash('error', "Une erreur est survenue au moment de la  génération de votre chaine de transmission, il se peut que la chaine de validation soit mal configurée..");
        }
        return false;
    }
}
