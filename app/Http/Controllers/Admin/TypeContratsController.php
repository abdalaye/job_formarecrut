<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenericListRequest;
use App\Models\TypeContrat;
use Illuminate\Http\Request;

class TypeContratsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partial = request()->query("partial");
        $type_contrats = TypeContrat::orderByDesc('created_at')->get()->all();
        $typeContrat = new TypeContrat(['statut' => true]);

        return view("admin.type_contrats.index", compact("type_contrats", "typeContrat"));
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
        $typeContrat = new TypeContrat($data);

        return $typeContrat->save() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
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
    public function update(GenericListRequest $request, TypeContrat $typeContrat)
    {
        $data = $request->validated();
        return $typeContrat->update($data) ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeContrat $typeContrat)
    {
        return $typeContrat->delete() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }
}
