<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partial = request()->query("partial");
        $cities = City::orderByDesc('created_at')->get()->all();
        $city = new City(['statut' => true]);

        return view(isset($partial) && $partial ? "admin.cities._table" : "admin.cities.index", compact("cities", "city"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $data = $request->validated();
        $city = new City($data);

        return $city->save() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
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
    public function update(CityRequest $request, City $city)
    {
        $data = $request->validated();
        return $city->update($data) ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        return $city->delete() ? back()->withSuccess("Votre requête a été effectuée avec succès !") :
        back()->withError("Une erreur est survenue au moment de la finalisation de votre requête !");
    }
}
