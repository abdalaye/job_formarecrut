<?php


namespace App\Http\Controllers;

use App\Models\DocumentPiece;
use App\Models\Jalon;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class JalonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        request()->validate([
			'jalon.action' => 'required|max:255'
        ]);
        $data = request('jalon');
        $pieces = request("pieces") ?? [];
       // dd( $pieces);
        $jalon = new Jalon($data);
        $validation = Validation::find($data['validation_id']);
        if($jalon->save()){
            if(!empty($pieces)){
                $this->saveDocumentPieces($pieces, $validation->document_id, $jalon->id ,$validation->document->type_document->extensions ?? []);
            }
            Session::flash('success', "Le jalon a été enregistré avec succés.");
        }else{
            Session::flash('error', "L'enregistrement du jalon a échoué, veuillez réessayez.");
        }
        return back();
    }

    private function saveDocumentPieces($array, $document_id,$jalon_id, $extensions) {
        if(count($array)) {
            foreach ($array as $tmp_piece) {
                $ext = $tmp_piece['file']->extension();
                $uploadFile = UtilitiesController::uploadFile($tmp_piece['file'],"uploads/document_pieces", $extensions);
                if($uploadFile) {
                    DocumentPiece::create([
                        'name' => $tmp_piece['name'],
                        'url' => $uploadFile,
                        'jalon_id'=>$jalon_id,
                        'extension' => $ext,
                        'document_id' => $document_id
                    ]);
                }
            }
        }
    }


    protected function validateData() {
        return request()->validate([
            "jalon[action]" => "required|min:2|max:250",
        ]);
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
    public function update(Request $request, $id)
    {
        $data = request('jalon');
        $jalon = Jalon::find($id);
        $pieces = request("pieces") ?? [];
        $validation = Validation::find($jalon->validation_id);
        if(!empty($pieces)){
            $this->saveDocumentPieces($pieces, $validation->document_id, $jalon->id ,$validation->document->type_document->extensions ?? []);
        }
        if($jalon){
            if($jalon->update($data)){

                Session::flash('success', "L'enregistrement a été effectué avec succés.");
            }else{
                Session::flash('error', "L'enregistrement a échoué, veuillez réessayez.");
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jalon = Jalon::find($id);
        if($jalon){
            $jalon->delete() ?
            Session::flash('success', "La suppression a été effectuée avec succés.") :
            Session::flash('error', "La suppression a échouée, veuillez réessayez.");
        }
        return back();
    }
}
