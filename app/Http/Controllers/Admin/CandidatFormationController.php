<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidat;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidatFormationController extends Controller
{
    public function store(Request $request, Candidat $candidat)
    {
        $validatedData = $this->validateRequest($request);

        $training      = $candidat->formations()->create($validatedData);

        if(! $training) return back()->with('error', "Erreur lors de l'ajout de la formation.");

        return back()->with('success', 'Formation ajoutée avec succès.');
    }


    public function validateRequest(Request $request)
    {
        return $request->validate([
            'formation'     => 'required',
            'etablissement' => 'required',
            'ville'         => 'required',
            'date_debut'    => 'required',
            'date_fin'      => 'required|date|after:date_debut',
            'description'   => 'required',
        ]);
    }

    public function destroy(Candidat $candidat, Training $training) 
    {
        $training = $candidat->formations()->where('id', $training->id)->firstOrFail();

        $training->delete();
        
        return back()->with('error', 'Formation supprimée.');   
    }
}
