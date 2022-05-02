<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use App\Models\Entreprise;
use Illuminate\Http\Request;
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

        $this->entrepriseRepo->saveTrainings($trainings, $recruteur);
        
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

        $this->entrepriseRepo->saveExperiences($experiences, $recruteur);

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

    public function removeExperience(Entreprise $entreprise, ProExperience $pro_experience)
    {
        $pro_experience = $entreprise->pro_experiences()->where('id', $pro_experience->id)->first();

        $pro_experience->delete();

        return back();
    }
    
    public function removeTraining(Entreprise $entreprise, Training $training)
    {
        $training = $entreprise->trainings()->where('id', $training->id)->first();

        $training->delete();

        return back();
    }
}
