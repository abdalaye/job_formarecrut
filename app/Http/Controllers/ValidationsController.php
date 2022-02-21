<?php

namespace App\Http\Controllers;

use App\Events\DocumentsEvent;
use App\Models\Collaborateur;
use App\Models\Document;
use App\Models\Jalon;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use function Symfony\Component\String\b;

class ValidationsController extends Controller
{
    public function traiter($id){

    }


    public function receptions(){
        $validations_encours = [];
        $collaborateur = Auth::user()->collaborateur;
        if($collaborateur) {
            $validations_encours = $collaborateur->validations()->where('statut_validation_id', 2)->get();
        };
        return view('validations.receptions',compact('validations_encours'));
    }

    public function transmettre(){
        $data = request()->except(['collaborateur_id','_token']);
        $data['date_cloture'] = now();
        $collaborateur_id = request('collaborateur_id');
        $validation = Validation::find($data['id']);
        if($validation->update($data)){
            if(isset( $collaborateur_id)){
                $validation->suivant($collaborateur_id);
            } else $validation->suivant();
            Session::flash('success', "La transmission a été effectuée avec succés.");
        }else{
            Session::flash('error', "La transmission a échoué, veuillez réessayez.");
        }
        return redirect('/receptions');
    }

    public function update($id){
        $validation = Validation::find($id);
        $data = request('validation');
        if($validation){
            $validation->update($data) ?
            Session::flash('success', "Le commentaire a été enregistré avec succés.") :
            Session::flash('error', "L'enregistrement du commentaire a échoué, veuillez réessayez.");
        }
        return back();
    }

    public function cloturerDocument(){
        $data = request()->except(['_token']);
        $validation_id = $data['validation_id'];
        $validation = Validation::find($validation_id);
        $validation->document->statut_document_id = 3;
        $validation->document->date_cloture = now();
        $validation->date_cloture =  now();
        $validation->statut_validation_id = $data['statut_validation_id'];
        if($validation->save()){
           if($validation->document->save()){
                event(new DocumentsEvent("document:cloture", $validation->document));
                Session::flash('success', "Le document a été validé avec succés.") ;
           }else{
                Session::flash('error', "La validation du document a échoué, veuillez réessayez.");
           }

        }
        return redirect('/receptions');
    }


    public function transmission($id){
        $validation = Validation::find($id);
        $collaborateur_id = Auth::user()->collaborateur->id;

        $collaborateurs = Collaborateur::all()->toArray();
        $is_libre = $validation->document->is_libre;
        // dd( Auth::user()->collaborateur->toArray());
       // dd($collaborateurs->toArray());
       unset($collaborateurs[array_search(Auth::user()->collaborateur->toArray(), $collaborateurs)]);

        return view('validations.transmission',compact('validation','collaborateurs','is_libre','collaborateur_id'));
    }

}
