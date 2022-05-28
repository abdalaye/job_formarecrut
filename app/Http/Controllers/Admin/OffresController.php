<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OffreRequest;
use App\Repositories\OffreRepository;

class OffresController extends Controller
{
    protected $offreRepo;

    public function __construct(OffreRepository $offreRepo)
    {
        $this->offreRepo = $offreRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::notExpired()->get();
        return view("admin.offres.index", compact("offres"));
    }

    public function expired()
    {
        $offres = Offre::expired()->get();
        $title = "Liste des offres expirées";
        return view("admin.offres.index", compact("offres", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offre = new Offre();

        return view("admin.offres.create", compact("offre"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffreRequest $request)
    {
        return $this->offreRepo->store($request->validated()) ?
                redirect()->route("admin.offres.index")->withSuccess('Offre ajoutée avec succès.') :
                back()->withError("L'ajout de l'offre a échoué, veuillez réessayer.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        return view("admin.offres.show", compact("offre"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        return view("admin.offres.edit", compact("offre"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(OffreRequest $request, Offre $offre)
    {
        return $this->offreRepo->update($offre->id, $request->validated()) ?
                back()->withSuccess('Offre mise à jour avec succès.') :
                back()->withError("La mise à jour de l'offre a échoué, veuillez réessayer.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        return $this->offreRepo->destroy($offre->id) ?
        back()->withSuccess('Offre supprimée avec succès.') :
        back()->withError("La suppression de l'offre a échoué, veuillez réessayer.");
    }
}
