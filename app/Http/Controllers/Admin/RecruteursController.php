<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EntrepriseRequest;
use App\Repositories\EntrepriseRepository;

class RecruteursController extends Controller
{
    protected $entrepriseRepo;

    public function __construct(EntrepriseRepository $entrepriseRepo)
    {
        $this->entrepriseRepo = $entrepriseRepo;
    }

    public function actifs()
    {
        $recruteurs = $this->entrepriseRepo->active()->get();
        
        return view('admin.recruteurs.actifs', compact('recruteurs'));
    }


    public function inactifs()
    {
        $recruteurs = $this->entrepriseRepo->active()->get();

        return view('admin.recruteurs.inactifs', compact('recruteurs'));
    }

    public function show(int $id) 
    {
        $recruteur = $this->entrepriseRepo->find($id);

        if(empty($recruteur)) {
            return redirect()->route('admin.recruteurs.actifs')
            ->with('error', 'recruteur introuvable');
        }

        return view('admin.recruteurs.show', compact('recruteur'));
    }


    public function edit(int $id) 
    {
        $recruteur = $this->entrepriseRepo->find($id);

        if(empty($recruteur)) {
            redirect()->route('admin.recruteurs.actifs')->with('error', 'recruteur introuvable.');
        }

        return view('admin.recruteurs.edit', compact('recruteur'));
    }

    public function step1(EntrepriseRequest $request, int $id)
    {
        $recruteur = $this->entrepriseRepo->find($id);
        
        $currentStep = (int) $request->step;

        if (empty($recruteur)) {
            return redirect()
            ->route('admin.recruteurs.actifs')
            ->withError('Recruteur introuvable.');
        }

        if($recruteur = $this->entrepriseRepo->update($request->validated(), $id)) {
            return redirect()
            ->route("admin.recruteurs.edit", [
                'entreprise' => $recruteur->id, 
                'step' => $request->action === 'next' ? $currentStep + 1 : $currentStep, 
                'hash' => sha1($recruteur->id),
            ]);
        } else {
            return back()->withError(__('actions.update.error'));
        }
    }

    public function step2(int $id, EntrepriseRequest $request) 
    {
        $trainings = $request->get('training');

        $currentStep = (int) $request->step;
        
        $recruteur = $this->entrepriseRepo->find($id);
        
        foreach($trainings as $training) {
            $recruteur->trainings()->create([
                'formation'     => $training['formation'],
                'etablissement' => $training['etablissement'],
                'ville'         => $training['ville'],
                'debut_mois'    => $training['debut_mois'],
                'debut_annee'   => $training['debut_annee'],
                'fin_mois'      => $training['fin_mois'],
                'fin_annee'     => $training['fin_annee'],
                'description'   => $training['description'],
            ]);
        }

        return response()->json([
            'success' => true, 
            'target'  => url()->route('admin.recruteurs.edit', [
                'entreprise' => $recruteur->id, 
                'step' => $currentStep + 1,
                'hash' => sha1($recruteur->id),
            ]),
            'message' => 'Enregistrement effectué'
        ]);
    }

    public function step3(int $id, EntrepriseRequest $request) 
    {
        $experiences = $request->get('pro_experience');

        $currentStep = (int) $request->step;
        
        $recruteur = $this->entrepriseRepo->find($id);
        
        foreach($experiences as $experience) {
            $recruteur->pro_experiences()->create([
                'poste'         => $experience['poste'],
                'employeur'     => $experience['employeur'],
                'ville'         => $experience['ville'],
                'debut_mois'    => $experience['debut_mois'],
                'debut_annee'   => $experience['debut_annee'],
                'fin_mois'      => $experience['fin_mois'],
                'fin_annee'     => $experience['fin_annee'],
                'description'   => $experience['description'],
            ]);
        }

        return response()->json([
            'success' => true, 
            'target'  => url()->route('admin.recruteurs.edit', [
                'entreprise' => $recruteur->id, 
                'step' => $currentStep + 1,
                'hash' => sha1($recruteur->id),
            ]),
            'message' => 'Enregistrement effectué'
        ]);
    }
}
