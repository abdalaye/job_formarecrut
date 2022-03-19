<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenericListRequest;
use App\Models\NiveauEtude;
use Illuminate\Http\Request;

class NiveauEtudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partial = request()->query("partial");
        $niveau_etudes = NiveauEtude::orderByDesc('created_at')->get()->all();
        $niveauEtude = new NiveauEtude(['statut' => true]);

        return view("admin.niveau_etudes.index", compact("niveau_etudes", "niveauEtude"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenericListRequest $request)
    {
        $data = $request->validated();
        $niveauEtude = new NiveauEtude($data);

        return $niveauEtude->save() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(GenericListRequest $request, NiveauEtude $niveauEtude)
    {
        $data = $request->validated();
        return $niveauEtude->update($data) ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NiveauEtude $niveauEtude)
    {
        return $niveauEtude->delete() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }
}
