<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidat;
use App\Models\Formation;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatFormationFormRequest;

class CandidatFormationController extends Controller
{
    public function store(CandidatFormationFormRequest $request, Candidat $candidat)
    {
        $formation      = $candidat->formations()->create($request->validated());

        if(! $formation) return back()->with('error', "Erreur lors de l'ajout de la formation.");

        return back()->with('success', 'Formation ajoutée avec succès.');
    }

    public function update(CandidatFormationFormRequest $request, Candidat $candidat, Formation $formation) 
    {
        $formation = $candidat->formations()->where('id', $formation->id)->firstOrFail();

        $formation->update($request->validated());

        return back()->with('success', 'Formation modifiée avec succès.');
    }

    public function destroy(Candidat $candidat, Formation $formation) 
    {
        $formation = $candidat->formations()->where('id', $formation->id)->firstOrFail();

        $formation->delete();
        
        return back()->with('error', 'Formation supprimée.');   
    }
}
