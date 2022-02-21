<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChaineValidation;
use App\Models\LigneChaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChaineValidationsController extends Controller
{
    public function store(Request $request) {
        $data = $this->validateData();
        $chaine_validation = new ChaineValidation($data);

        $chaine_validation->save() ? 
        Session::flash('success', 'La chaine a été bien enregistrée, continuez la configuration.') : 
        Session::flash('error', "L'enregistrement a échoué, veuillez réessayez.");

        return back();
    }

    public function update(Request $request, ChaineValidation $chainevalidation) {
        $data = $this->validateData(true);

        //Modification des données array en chaine
        if(count($data)) {
            foreach ($data as $key => $value) {
                if(is_array($value)) {
                    $data[$key] = implode(";",$value);
                }
            }
        }

        if(request("is_list_diffusion")) {
           if(!isset($data['notify_all'])) $data['notify_all'] = null;
        //    if(!isset($data['is_libre'])) $data['is_libre'] = 0;
        }

        if(request("consultation_section")) {
           if(!isset($data['consultation_service_ids'])) $data['consultation_service_ids'] = null;
           if(!isset($data['consultation_departement_ids'])) $data['consultation_departement_ids'] = null;
           if(!isset($data['consultation_direction_ids'])) $data['consultation_direction_ids'] = null;
           if(!isset($data['consultation_collaborateur_ids']) || trim($data['consultation_collaborateur_ids']) == "") $data['consultation_collaborateur_ids'] = null;
        }
        if(request("restriction_section")) {
            if(!isset($data['restriction_service_ids'])) $data['restriction_service_ids'] = null;
            if(!isset($data['restriction_departement_ids'])) $data['restriction_departement_ids'] = null;
            if(!isset($data['restriction_direction_ids'])) $data['restriction_direction_ids'] = null;
            if(!isset($data['restriction_collaborateur_ids']) || trim($data['restriction_collaborateur_ids']) == "") $data['restriction_collaborateur_ids'] = null;
        }

        $chainevalidation->update($data) ? 
        Session::flash('success', 'La chaine a été bien mise à jour, continuez la configuration.') : 
        Session::flash('error', "L'enregistrement a échoué, veuillez réessayez.");

        return back();
    }

    public function addLine(Request $request) {
        $data = $request->validate([
            'rang' => 'required',
            'collaborateur_id' => 'required',
            'chaine_validation_id' => 'required'
        ]);

        $ligne = new \App\Models\LigneChaine($data);
        $ligne->save() ? 
        Session::flash('success', 'La ligne de chaine a été bien enregistrée, continuez la configuration.') : 
        Session::flash('error', "L'enregistrement a échoué, veuillez réessayez.");

        return back();
    }

    public function updateLine(Request $request, LigneChaine $ligne) {
        $data = $request->validate([
            'collaborateur_id' => 'required',
        ]);

        $ligne->update($data) ? 
        Session::flash('success', 'La ligne de chaine a été bien mise à jour, continuez la configuration.') : 
        Session::flash('error', "La mise à jour a échoué, veuillez réessayez.");

        return back();
    }

    public function destroyLine(Request $request, LigneChaine $ligne) {
        if($ligne->delete()) {
            $lignes = LigneChaine::where('chaine_validation_id', $ligne->chaine_validation_id)->orderBy('rang')->get();
            if(count($lignes)) {
                for ($i=1; $i <= count($lignes); $i++) { 
                    $lignes[$i - 1]->update(['rang' => $i]);
                }
            }
        }

        return back();
    }

    private function validateData($update = false) {
        if($update) {
            return request()->validate([
                'name' => 'nullable',
                'is_libre' => 'nullable',
                'type_document_id' => 'nullable',
                'include_managers' => 'nullable',
                'notify_all' => 'nullable',
                'notify_managers' => 'nullable',
                'restriction_service_ids' => 'nullable',
                'restriction_departement_ids' => 'nullable',
                'restriction_direction_ids' => 'nullable',
                'restriction_collaborateur_ids' => 'nullable',
                'consultation_service_ids' => 'nullable',
                'consultation_departement_ids' => 'nullable',
                'consultation_direction_ids' => 'nullable',
                'consultation_collaborateur_ids' => 'nullable',
            ]);
        }

        return request()->validate([
            'name' => 'required',
            'is_libre' => 'required',
            'type_document_id' => 'required',
            'include_managers' => 'required'
        ]);
    }
}
