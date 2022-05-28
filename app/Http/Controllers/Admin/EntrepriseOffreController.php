<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offre;
use App\Models\Entreprise;
use App\Http\Controllers\Controller;
use App\Http\Requests\EntrepriseOffreRequest;

class EntrepriseOffreController extends Controller
{
    public function store(EntrepriseOffreRequest $request, Entreprise $entreprise)
    {
        $offre      = $entreprise->offres()->create($request->validated());

        if(! $offre) return back()->with('error', "Erreur lors de l'ajout de l'offre.");

        if($request->get('add_again') == '1') {
            return redirect()->route('admin.recruteurs.edit', ['entreprise' => $entreprise->id, 'step' => 3, 'hash' => sha1($entreprise->id), 'add_again' => 1]);
        }

        return redirect()->route('admin.recruteurs.edit', ['entreprise' => $entreprise->id, 'step' => 3, 'hash' => sha1($entreprise->id)])
        ->with('success', 'Offre ajoutée avec succès.');
    }

    public function update(EntrepriseOffreRequest $request, Entreprise $entreprise, Offre $offre) 
    {
        $offre = $entreprise->offres()->where('id', $offre->id)->firstOrFail();

        $offre->update($request->validated());

        return redirect()->route('admin.recruteurs.edit', ['entreprise' => $entreprise->id, 'step' => 3, 'hash' => sha1($entreprise->id)])
        ->with('success', 'Compétence modifiée avec succès.');
    }

    public function destroy(Entreprise $entreprise, Offre $offre)
    {
        $offre = $entreprise->offres()->where('id', $offre->id)->firstOrFail();

        $offre->delete();
        
        return redirect()->route('admin.recruteurs.edit', ['entreprise' => $entreprise->id, 'step' => 3, 'hash' => sha1($entreprise->id)])
        ->with('success', 'Compétence supprimée.');   
    }
}
