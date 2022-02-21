@php
use Carbon\Carbon;
use App\Utils\Couleur;

    $data[0]['label'] = "Nombre de documents";
    $data[1]['label'] = "Duree moyenne de traitement d un document";
    $data[2]['label'] = 'Duree moyenne de traitement d un document par collaborateur';
    $abscisses = [];
    $couleurs_doughnut = [];
    $label_types = [];
    $nombre_documents = [];
    foreach ($type_documents as $i => $type) {
        $label_types[$i] = $type->name;
        $nombre_documents[$i] = count($type->documents()->clotures()->get());
        $data[0]['ordonnees'][] = count($type->documents()->clotures()->get());
        $data[1]['ordonnees'][] = $type->statistiques()['duree_moyenne_documents'];
        $data[2]['ordonnees'][] = $type->statistiques()['duree_moyenne_validations'];
        $couleur = new Couleur($i);
        $couleurs_doughnut [] = Couleur::get($i);
        $abscisses[] = $type->name;
    }
    $couleurs = ['#3c5ba6','#f9d716','#e52322'];
@endphp

@extends('layouts.admin')
@section('title','Statistiques')
@section('content')
    <div class="col-lg-6 col-md-6">
        <div class="card collapsed-card shadow-none">
            <div class="card-header">
            <h3 class="card-title"><i class="fa fa-filter" aria-hidden="true"></i> Filtre sur une période </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus-circle"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('admin.statistiques') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="">Date Début</label>
                                <input type="date" class="form-control" value="{{ $date_debut }}" name="date_debut">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="">Date Fin</label>
                                <input type="date" class="form-control" value="{{ $date_fin }}" name="date_fin">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-outline-primary" style="margin-top: 30px"> Valider</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer text-center" style="display: none;">
            <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div> --}}
            <!-- /.card-footer -->
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card collapsed-card shadow-none">
            <div class="card-header">
                <p class="m-0">
                    Date du
                    <strong class="text-danger">
                        <?php
                            $date_debut = carbon::createFromFormat('Y-m-d', $date_debut);
                            $date_fin = carbon::createFromFormat('Y-m-d', $date_fin);
                        ?>
                        {{ isset($date_debut) ? $date_debut->locale('fr')->isoFormat('dddd D MMMM Y') : '' }}
                    </strong>
                    au
                    <strong class="text-danger">
                        {{ isset($date_fin) ? $date_fin->locale('fr')->isoFormat('dddd D MMMM Y') : '' }}
                    </strong>
                </p>
            </div>
        </div>
    </div>
    <div class="col-12">

        <div class="row">

            <div class="col-md-4 col-6 col-lg-4">
                <a href="#">
                    <div class="card shadow-none block">
                        <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted  mb-2 mt-4">
                                Documents Traités <br>
                                <span class="subtitle text-primary">Nombre total</span>

                            </h6>

                            <!-- Heading -->
                            <span class="mb-4 mt-2 h2 text-muted">
                                {{  isset($documents_traites) ? count($documents_traites) : '0' }}
                            </span>

                            </div>
                            <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe icone fe-dollar-sign text-muted mb-0">
                                <i class="fa fa-file text-primary"></i>
                            </span>

                            </div>
                        </div> <!-- / .row -->
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-6 col-lg-4">
                <a href="#">
                    <div class="card shadow-none block">
                        <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted  mb-2 mt-4">
                                Durée Moyenne<br>
                                <span class="subtitle text-primary">Traitements sur un document</span>

                            </h6>

                            <!-- Heading -->
                            <span class="mb-4 mt-2 h2 text-muted">
                                {{  isset($duree_moyenne) ? round($duree_moyenne,2) : '0' }}
                            </span>

                            </div>
                            <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe icone fe-dollar-sign text-muted mb-0">
                                <i class="fa fa-times-circle text-primary"></i>
                            </span>

                            </div>
                        </div> <!-- / .row -->
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-6 col-lg-4">
                <a href="#">
                    <div class="card shadow-none block">
                        <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted  mb-2 mt-4">
                                Durée Moyenne<br>
                                <span class="subtitle text-primary">Traitements/Collaborateur</span>
                            </h6>

                            <!-- Heading -->
                            <span class="mb-4 mt-2 h2 text-muted">
                                {{  isset($duree_moyenne_collaborateur) ? round($duree_moyenne_collaborateur,1)  : '0' }}
                            </span>

                            </div>
                            <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe icone fe-dollar-sign text-muted mb-0">
                                <i class="fa fa-clock text-primary"></i>
                            </span>

                            </div>
                        </div> <!-- / .row -->
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>

    <div class="col-12">
        @include('admin.dashboard.graph')
    </div>
@endsection

@section('scriptBottom')
    <script>
        const labels = @json($abscisses) ;
        const data = {
            labels: labels,
            datasets: [
                @foreach ($data as $i => $_data)
                    {
                        label: "{{ $_data['label'] }}",
                        data:   @json($_data['ordonnees']),
                        backgroundColor: [
                            '{{ isset($couleurs[$i])?$couleurs[$i]."80":"gray" }}',
                        ],
                        borderColor: [
                            '{{ isset($couleurs[$i])?$couleurs[$i]:"gray" }}',
                        ],
                        borderWidth: 2,
                        @if ($i == 0)
                            yAxisID: 'y0',
                        @else
                            yAxisID: 'y1',
                        @endif
                    },
                @endforeach
            ]
        };
        const config = {
            type: 'bar',
            data: data,

            options: {
                plugins:{
                    legend : {
                        position: 'bottom'
                    },
                },

                scales: {
                    y0: {
                        type: 'linear',
                        display: true,
                        position: 'left',

                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        // grid line settings
                        grid: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                        position: 'right',
                    },

                },
            },
        };
        const chartEl = document.getElementById("myChart");

        chartEl.height = 100;
        const myChart = new Chart(
            chartEl,
            config
        );

        // ------------------------------------------------//
        const data1 = {
            labels: @json($label_types),
            datasets: [{
                label: 'My First Dataset',
                data: @json($nombre_documents),
                backgroundColor:@json($couleurs_doughnut),
                hoverOffset: 4,
            }]
        };
        const config1 = {
            type: 'doughnut',
            data: data1,
            options: {
                plugins:{
                    legend : {
                        position: 'bottom'
                    },
                },
            }
        };
        const doughnut = document.getElementById('myDoughnut');
        doughnut.height = 60;
        const myDoughnut = new Chart(
            doughnut,
            config1
        );
    </script>

    @include('partials.utilities.datatableElementDash', ['id' => 'datatable'])
@endsection
