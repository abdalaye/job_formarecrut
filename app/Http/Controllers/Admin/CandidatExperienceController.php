<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidat;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatExperienceFormRequest;
use App\Models\Experience;

class CandidatExperienceController extends Controller
{
    public function store(CandidatExperienceFormRequest $request, Candidat $candidat)
    {
        $experience      = $candidat->experiences()->create($request->validated());

        if(! $experience) return back()->with('error', "Erreur lors de l'ajout de l'expérience professionnelle.");

        return back()->with('success', 'Expérience professionnelle ajoutée avec succès.');
    }

    public function update(CandidatExperienceFormRequest $request, Candidat $candidat, Experience $experience) 
    {
        $experience = $candidat->experiences()->where('id', $experience->id)->firstOrFail();

        $experience->update($request->validated());

        return back()->with('success', 'Expérience professionnelle modifiée avec succès.');
    }

    public function destroy(Candidat $candidat, Experience $experience) 
    {
        $experience = $candidat->experiences()->where('id', $experience->id)->firstOrFail();

        $experience->delete();
        
        return back()->with('success', 'Expérience professionnelle supprimée.');   
    }
}
