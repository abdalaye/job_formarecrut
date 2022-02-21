@component('mail::message')
# {{ $complement_subject }}

{{ $collaborateur->nom_complet }}, <br>
{!! $content !!}


## Informations du document

@component('mail::panel')
@component('mail::table')
| Informations| Valeurs |
|:-----------|:-------|
| ID Document|<mark><b>{{ $document->ref }}</b></mark>|
| Type  |{{ $type_document->name ?? "Non défini" }}|
| Libellé  |{{ $document->name }}|
| Soumissionnaire |{{ $proprietaire->nom_complet }}|
| Date soumission|{{ $document->date_publication }}|
@endcomponent
@endcomponent


Cordialement,<br>
{{ config('app.name') }} - TotalEnergies SN
@endcomponent
