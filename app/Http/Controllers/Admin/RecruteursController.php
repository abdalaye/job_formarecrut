<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entreprise;
use App\Models\ProExperience;
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

        $step = (int) request('step', 1);

        if(empty($recruteur)) {
            redirect()->route('admin.recruteurs.actifs')->with('error', 'recruteur introuvable.');
        }

        return view('admin.recruteurs.edit', compact('recruteur', 'step'));
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
        //
    }

    public function step3(int $id, EntrepriseRequest $request) 
    {
        //
    }
}
