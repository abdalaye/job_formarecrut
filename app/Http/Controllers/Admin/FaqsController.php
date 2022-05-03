<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::latest()->get();

        return view("admin.faqs.index", compact("faqs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faq = new Faq();
        return view("admin.faqs.create", compact("faq"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData();

        $faq = new Faq($data);
        if($faq->save()) {
            return redirect()->route('admin.faqs.index')
                    ->withSuccess(__('actions.created.success'));
        }

        return back()
            ->withError(__('actions.created.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view("admin.faqs.show", compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view("admin.faqs.edit", compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $data = $this->validateData();

        if($faq->update($data)) {
            return back()->withSuccess(__('actions.update.success'));
        }

        return back()
            ->withError(__('actions.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        if($faq->delete()) {
            return redirect()->route('admin.faqs.index')
                    ->withSuccess(__('actions.delete.success'));
        }

        return back()
            ->withError(__('actions.delete.fail'));
    }

    private function validateData() {
        return request()->validate([
            'question' => 'required|min: 10',
            'answer'   => 'required|min: 20',
            'statut'   => 'nullable'
        ]);
    }
}
