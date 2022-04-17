<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatStep1Request;
use App\Http\Requests\CandidatUpdateRequest;
use App\Models\Candidat;
use App\Repositories\CandidatRepository;
use Illuminate\Http\Request;

class CandidatsController extends Controller
{
    protected $candidatRepository;

    public function __construct(CandidatRepository $candidatRepository)
    {
        $this->candidatRepository = $candidatRepository;
    }

    public function complets()
    {
       $title = "Candidats - Profils complets";
       $candidats = Candidat::where("statut", 1)
                    ->orderByDesc('created_at')
                    ->with('user')
                    ->get()
                    ->all();

        return view("admin.candidats.index", compact("title", "candidats"));
    }


    public function incomplets()
    {
        $title = "Candidats - Profils incomplets";
        $candidats = Candidat::where("statut", 0)
                    ->orderByDesc('created_at')
                    ->with('user')
                    ->get()
                    ->all();

        return view("admin.candidats.index", compact("title", "candidats"));
    }

    public function show(Candidat $candidat)
    {
        return view('admin.candidats.show', compact("candidat"));
    }

    public function edit(Candidat $candidat)
    {
        return view("admin.candidats.edit", compact("candidat"));
    }

    public function step1(CandidatStep1Request $request, Candidat $candidat)
    {
        $data = $request->validated();

        if($this->candidatRepository->updateStep1($candidat,$data)) {
            $action = request("action") ?? null;
            session()->flash("success", __('actions.update.success'));
            if($action && $action == "next") {
                return redirect()->route("admin.candidats.edit", ['candidat' => $candidat, "step" => 2, "hash" => sha1($candidat->id)]);
            }
        } else {
            session()->flash("error", __('actions.update.error'));
        }
        return back();
    }
}
