<?php

namespace App\Http\Controllers;

use App\Models\DocumentPiece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocumentPiecesController extends Controller
{
    public function destroy($id) {
        $document_piece = DocumentPiece::findOrFail($id);
        if($document_piece->delete()) {
            UtilitiesController::removeFile($document_piece->url);
            Session::flash('success', 'La suppression a été effectuée avec succès!');
        } else Session::flash('error', 'La suppression échoué, reéssayez plutart!');

        return back();
    }
}
