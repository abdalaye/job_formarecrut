<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchedDocuments;

    public function __construct()
    {
        $this->searchedDocuments = Document::where('statut_document_id', '>', 1)->get();
    }

    public function search() {
        $search = request()->query('search');
        $documents = [];
        if($search) {
            $search = strtolower($search);

            $documents = $this->searchedDocuments->filter(function($document) use ($search) {
                return self::searchReturn($document, $search);
            });
        }

        return view("search", compact("documents"));
    }

    static function searchReturn(Document $item, $mots) {
        $condition = (
            (strpos(strtolower($item->ref), $mots)  !== false) ||
            (strpos(strtolower($item->name), $mots)  !== false) ||
            (strpos(strtolower($item->type_document->name ?? ""), $mots)  !== false ) ||
            (strpos(strtolower($item->collaborateur->nom_complet ?? ""), $mots)  !== false)
        );
        return $condition;
    }
}
