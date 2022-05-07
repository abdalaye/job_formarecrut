<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidat;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatCompetenceRequest;
use App\Models\Competence;

class CandidatCompetenceController extends Controller
{
    public function store(CandidatCompetenceRequest $request, Candidat $candidat) 
    {
        $competence      = $candidat->competences()->create($request->validated());

        if(! $competence) return back()->with('error', "Erreur lors de l'ajout de la compétence.");

        if($request->get('add_again') == '1') {
            return redirect()->route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 4, 'hash' => sha1($candidat->id), 'add_again' => 1]);
        }

        return redirect()->route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 4, 'hash' => sha1($candidat->id)])
        ->with('success', 'Compétence ajoutée avec succès.');
    }



    public function update(CandidatCompetenceRequest $request, Candidat $candidat, Competence $competence) 
    {
        $competence = $candidat->competences()->where('id', $competence->id)->firstOrFail();

        $competence->update($request->validated());

        return redirect()->route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 4, 'hash' => sha1($candidat->id)])
        ->with('success', 'Compétence modifiée avec succès.');
    }

    public function destroy(Candidat $candidat, Competence $competence) 
    {
        $competence = $candidat->competences()->where('id', $competence->id)->firstOrFail();

        $competence->delete();
        
        return redirect()->route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 4, 'hash' => sha1($candidat->id)])
        ->with('success', 'Compétence supprimée.');   
    }
}
