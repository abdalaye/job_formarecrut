<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeChaine;
use Illuminate\Http\Request;

class TypeChainesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_chaines = TypeChaine::orderByDesc('id')->get()->all();
        
        return view("admin.parametres.type_chaines.index", compact("type_chaines"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeChaine  $typeChaine
     * @return \Illuminate\Http\Response
     */
    public function show(TypeChaine $typeChaine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeChaine  $typeChaine
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeChaine $typeChaine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeChaine  $typeChaine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeChaine $typeChaine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeChaine  $typeChaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeChaine $typeChaine)
    {
        //
    }
}
