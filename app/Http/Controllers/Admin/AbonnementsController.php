<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbonnementRequest;
use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partial = request()->query("partial");
        $abonnements = Abonnement::orderByDesc('created_at')->get()->all();

        return view("admin.abonnements.index", compact("abonnements"));
    }

    public function create()
    {
        $abonnement = new Abonnement(['statut' => true]);

        return view("admin.abonnements.create", compact("abonnement"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbonnementRequest $request)
    {
        $data = $request->validated();
        $abonnement = new Abonnement($data);

        return $abonnement->save() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Abonnement $abonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonnement $abonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbonnementRequest $request, Abonnement $abonnement)
    {
        $data = $request->validated();
        return $abonnement->update($data) ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abonnement $abonnement)
    {
        return $abonnement->delete() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }
}
