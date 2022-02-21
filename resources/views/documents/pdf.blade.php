@extends('layouts.pdf')

@section('title', 'Visualisation type de document')

@section('customCss')
    <style>

        * {
            font-family: "Arial", Arial, Helvetica, sans-serif;
        }
        .badge {
            padding: 14px 18px;
            border-radius: 8px;
            color: #fff;
            background: #444;
        }
        .page-break {
            page-break-after: always;
        }

        fieldset {
            border: none;
            margin: 18px auto;
            padding: 0 ;
        }

        hr {
            border: 1px solid #999;
        }
        h4 {
            margin-bottom: 0;
        }

        span.legend {
            display: inline-block;
        }
        fieldset legend, .legend {
            /* border: 1px solid #999; */
            padding: 8px 16px;
            /* border-radius: 8px; */
            background-color: #eee;
            font-weight: bold;
            border-bottom: none;
        }


        legend.header {
            background-color: #888;
            color: #fff;
            font-size: 18px;
        }

        legend.header > * {
            margin: 0;
            color: #fff;
            font-size: 18px;
        }

        .border {
            border: 1px solid #999;
        }

        table {
            border-collapse: collapse;
            border: 1px solid rgba(0, 0, 0, .1);
            width: 100%;
            font-size: 12px;
        }

        .description {
            font-size: 12px;
        }

        table tbody {

            border-radius: 8px;
        }
        table * {
            border: 1px dashed rgba(0, 0, 0, .2);
            border-top: none;
            text-align: left;
            padding: 8px 16px;
        }
        table i {
            border: none !important;
            font-size: 10px;
            font-weight: lighter;
        }


        .d-flex {
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
        }

        .w-50 {
            width: 50%;
        }
    </style>
@endsection

@section('content')
    <div style="width: 85%; margin: 0 auto">
        <h3>
            <span>{{ env("APP_NAME") }}</span> <img style="margin-left: 55%" src="{{ public_path('img/logo_pdf.png') }}" alt="ALT" height="80px">
        </h3>
        <h2 style="text-align: center; margin-top:0">Fiche Récapitulative</h1>
        <fieldset>
            {{-- <legend>Soumissionnaire</legend> --}}
            <h4><span class="legend">Soumissionnaire</span></h4>
            <table>
                <tbody>
                    <tr>
                        <th>Collaborateur</th>
                        <td>{{ $document->collaborateur->nom_complet ?? "---" }}</td>
                    </tr>
                    <tr>
                        <th>Poste occupé</th>
                        <td>{{ $document->collaborateur->poste ?? "__Pas de poste occupé__" }}</td>
                    </tr>
                    {{-- <tr>
                        <th>Date de soumission</th>
                        <td>{!! $document->date_publication ? $document->date_publication->format('d-m-Y') : "Non défini" !!} </td>
                    </tr> --}}
                </tbody>
            </table>
            <h4 style="margin-top: 20px;"><span class="legend">Détails du document</span></h4>
            <table border="1">
                <tbody>
                    <tr>
                        <th>Référence</th>
                        <td>{{ $document->ref }}</td>
                    </tr>
                    <tr>
                        <th>Libellé</th>
                        <td>{{ $document->name }}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{!! $document->type_document->name ?? "Non défini" !!} </td>
                    </tr>
                    <tr>
                        <th>Etat</th>
                        <td>{!! $document->statut_document->name ?? "Non défini" !!} </td>
                    </tr>
                    <tr>
                        <th>Date de soumission</th>
                        <td>{!! $document->date_publication ? $document->date_publication->format('d-m-Y') : "Non défini" !!} </td>
                    </tr>
                    <tr>
                        <th>Date de clôture</th>
                        <td>{!! $document->date_cloture ? $document->date_cloture->format('d-m-Y') : "Non défini" !!} </td>
                    </tr>
                    @if (count($infos))
                    <tr>
                        <th colspan="2" style="text-align: center">Informations supplémentaires</th>
                    </tr>
                    @foreach ($infos as $info)
                        <tr>
                            <th>{{ $info->field->name }}</th>
                            <td>
                                @if($info->field->type_field_id == 2)
                                    {{ number_format($info->value,0,',',' ') }}
                                @else
                                    {!! $info->value_texte !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            @if ($document->description)
            <h4 style="margin-top: 20px;"><span class="legend">Description de la demande</span></h4>

            <div class="description" style="border: 1px solid rgba(0, 0, 0, .1); padding: 4px 8px;">{!! $document->description !!}</div>
            @endif

            <h4 style="margin-top: 20px;"><span class="legend">Pièces jointes</span></h4>
            <table border="1">
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($document_pieces as $piece)
                        <tr>
                            <th>{{ $i }}</th>
                            <td>{!! $piece->name !!}</td>
                        </tr>
                        @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>


            <h4 style="margin-top: 20px;"><span class="legend">Parcours du document</span></h4>
            @php $i =1; @endphp
            <table border="1">
                <tbody>
                    <tr>
                        <th> 1 </th>
                        <th>
                            {{ $document->collaborateur->nom_complet ?? "Non défini" }} <br>
                            <i>{{ $document->collaborateur->poste ?? "__Pas de poste occupé__" }}</i>
                        </th>
                        <td>{{ $document->date_publication->format('d-m-Y H:i:s') ?? "Non défini" }}</td>
                    </tr>
                    @foreach ($document->validations as $validation)
                    <tr>
                        <th>{{ $i+1 }}</th>
                        <th>
                            {{ $validation->collaborateur->nom_complet ?? "Non défini" }} <br>
                            <i>{{ $validation->collaborateur->poste ?? "__Pas de poste occupé__" }}</i>
                        </th>
                        <td>{{ $validation->updated_at->format('d-m-Y H:i:s') ?? "Non défini" }}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </fieldset>
    </div>
@endsection
