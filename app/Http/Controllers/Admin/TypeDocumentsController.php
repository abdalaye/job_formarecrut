<?php

namespace App\Http\Controllers\Admin;

use App\Models\TypeDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilitiesController as utility;
use App\Http\Custom\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TypeDocumentsController extends Controller
{
    protected $folder_files = "uploads/type_documents/icons";

    public function index()
    {
        $type_documents = \App\Models\TypeDocument::orderByDesc('id')->get();
        $extensions = config("app.extensions");

        return view("admin.parametres.type_documents.index", compact("type_documents", "extensions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typedocument = new TypeDocument();

        return view("admin.parametres.type_documents.create", compact("typedocument"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData();

        $data['authorised_extensions'] = isset($data['authorised_extensions']) ?
                                        implode(";",$data['authorised_extensions']) :
                                        "";
        $typedocument = TypeDocument::create($data);
        if($typedocument) {
            $icon = request('icon');
            if($icon) { //Sauvegarde de l icone
                $url = utility::uploadFile($icon, $this->folder_files,explode(";", config("app.extensions.image")));
                if($url) {
                    $typedocument->icon = $url;
                    $typedocument->save();
                } else Session::flash("error", "L'icone n'a pu être chargée, réessayez plutard !");
            }
            //LOG
            Log::ACTION_GENEGAL("Création nouveau type Document",
                    "L'admnistrateur " . Auth::user()->nom_complet . " a démarré un nouveau type de document ".$typedocument->name.".");

            Session::flash("success", "Type de document ajouté avec succès !");
            return redirect()->route("admin.typedocuments.edit", $typedocument->id);
        } else Session::flash("error", "Echec de l'ajout du Type de document !");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeDocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDocument $typedocument)
    {
        $chaine = $typedocument->chaine_validation ?? null;
        $chaine_lignes = $chaine->ligne_chaines ?? [];
        $fields = $typedocument->fields ?? [];
        $staticFields = self::getStaticFields();


        return view('admin.parametres.type_documents.show', compact("chaine_lignes","typedocument", "chaine", "fields"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeDocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeDocument $typedocument)
    {
        $chaine = $typedocument->chaine_validation ?? null;
        $chaine_lignes = $chaine->ligne_chaines ?? [];
        $fields = $typedocument->fields ?? [];
        $staticFields = self::getStaticFields();

        return view('admin.parametres.type_documents.edit', compact("fields","chaine_lignes","staticFields","typedocument", "chaine"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeDocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDocument $typedocument)
    {
        $data = $this->validateData();

        $data['authorised_extensions'] = isset($data['authorised_extensions']) ?
        implode(";",$data['authorised_extensions']) :
        "";
        if($typedocument->update($data)) {
            $icon = request('icon');
            if($icon) { //Sauvegarde de l icone
                if($typedocument->getOriginal("icon")) {
                    utility::removeFile($typedocument->getOriginal("icon"));
                }

                $url = utility::uploadFile($icon, $this->folder_files,explode(";", config("app.extensions.image")));
                if($url) {
                    $typedocument->icon = $url;
                    $typedocument->save();
                } else Session::flash("error", "L'icone n'a pu être chargée, réessayez plutard !");
            }
            Session::flash("success", "Type de document mis à jour avec succès !");
        }
        else Session::flash("error", "Echec de la modification du Type de document !");

        return back();
    }


    public function publish(Request $request, TypeDocument $typedocument)
    {
        if($typedocument->is_not_valid) {
            return back()->withError('Etant une chaine prédéfinie, vous devez définir la chaine de transmission.');
        }

        if($typedocument->update(['statut' => 1])) {
            //LOG
            Log::ACTION_GENEGAL("Publication type Document",
                    "L'admnistrateur " . Auth::user()->nom_complet . " a publié le type de document : ".$typedocument->name.".");

            Session::flash("success", "Type de document a été publié avec succès !");
        }
        else Session::flash("error", "Echec de la publication du Type de document !");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeDocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDocument $typedocument)
    {
        $typedocument->delete() ?
        Session::flash("success", "Type de document supprimé avec succès!") :
        Session::flash("error", "La suppression du type de document a échoué");
        return redirect()->route('admin.typedocuments.index');
    }


    private function validateData() {
        return request()->validate([
            'name' => 'required',
            'authorised_extensions' => 'required'
        ]);
    }

    static public function getStaticFields() {
        return [
            [
                "name" => "Reférence",
                "type" => "Texte court"
            ],
            [
                "name" => "libellé",
                "type" => "Texte court"
            ],
            [
                "name" => "Description",
                "type" => "Texte Long"
            ],
            [
                "name" => "Liste pièces à joindre",
                "type" => "Pièce jointe"
            ],

        ];
    }
}
