<?php use Carbon\Carbon; ?>
<?php
    $consultations = array();
    foreach ($_type_documents_consultations as $i => $type_documents_consultation) {
        # code...
        $documents = $type_documents_consultation->consultations()->get();
            # code...
        $consultations['documents'][$i] = count($documents);
        $consultations['type_document'] [$i]= $type_documents_consultation->name;

    }
    // dd($consultations);
?>
@extends('layouts.admin')
@section('title','Tableau de bord')
@section('actions')
    @if(Auth::user()->is_admin)
        @if (isset($is_admin) && !$is_admin)
            <a href="{{ route('admin.admin-dashboard') }}" class="btn btn-sm btn-primary" style="margin: -10px 0;color:#fff !important">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                Tableau de bord Administrateur
            </a>

        @elseif(isset($is_admin) && $is_admin)
            <a href="{{ route('home') }}" class="btn btn-sm btn-warning" style="margin: -10px 0;color:#fff !important">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                Tableau de bord Collaborateur
            </a>
        @endif
    @endif
@endsection

@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-md-4 col-6 col-lg-4">
                <a href="{{ url('admin/parametres/typedocuments') }}">
                    <div class="card shadow-none">
                        <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted  mb-2 mt-4">
                                Types de Documents <br>
                                <span class="text-danger subtitle">Disponibles</span>
                            </h6>


                            <!-- Heading -->
                            <span class="mb-4 mt-2 h2">
                                {{  isset($_type_documents_consultations) ? count($_type_documents_consultations) : '0' }}
                            </span>
                            <!-- Badge -->
                            {{-- <span class="badge bg-success-soft mt-n1">
                                disponible(s)
                            </span> --}}
                            </div>
                            <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe icone fe-dollar-sign text-muted mb-0"><i class="fa fa-paperclip"></i></span>

                            </div>
                        </div> <!-- / .row -->
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-md-4 col-6 col-lg-4">
                <a href="#">
                    <div class="card shadow-none">
                        <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted  mb-2 mt-4 ">
                                Documents déposés <br>
                                <span class="text-danger subtitle">Toujours dans le circuit</span>
                            </h6>


                            <!-- Heading -->
                            <span class="mb-4 mt-2 h2">
                                {{  isset($_document_deposes) ? count($_document_deposes) : '0' }}

                            </span>
                            <!-- Badge -->
                            {{-- <span class="badge bg-success-soft mt-n1">
                                disponible(s)
                            </span> --}}
                            </div>
                            <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe icone fe-dollar-sign text-muted mb-0"><i class="fa fa-spinner"></i></span>

                            </div>
                        </div> <!-- / .row -->
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-md-4 col-6 col-lg-4">
                <a href="#">
                    <div class="card shadow-none">
                        <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted  mb-2 mt-4">
                                Documents Reçus <br>
                                <span class="text-danger subtitle">A traiter</span>
                            </h6>


                            <!-- Heading -->
                            <span class="mb-4 mt-2 h2">
                                {{  isset($_document_recus) ? count($_document_recus) : '0' }}
                            </span>
                            <!-- Badge -->
                            {{-- <span class="badge bg-success-soft mt-n1">
                                disponible(s)
                            </span> --}}
                            </div>
                            <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe icone fe-dollar-sign text-muted mb-0"><i class="fa fa-paperclip"></i></span>

                            </div>
                        </div> <!-- / .row -->
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">

            <div class="col-md-4">
                <div class="card shadow-none" >
                    <div class="card-header ui-sortable-handle">
                        <h6 class="card-title">
                            <i class="fa fa-info-circle"></i> ALERTES<br>
                            <span class="subtitle text-primary">Documents en attente de transmission</span>

                        </h6>
                        <!-- card tools -->
                        <div class="card-tools">
                          <button type="button" class="btn btn-primary btn-sm daterange" data-toggle="tooltip" title="Date range">
                                {{ count($_alertes) }}
                          </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body dashboard_liste p-0">


                        @if (isset($_alertes) && count($_alertes) > 0)
                            <div class="list-group list-group-flush">
                                @foreach ($_alertes as $alerte )
                                    <a href="{{ url('mesdocuments/'.$alerte->document->ref.'/consultation') }}" class="list-group-item list-group-item-action">
                                        {{-- <i class="fa fa-check-circle text-success-soft"></i> --}}
                                        {{ ($alerte->document->name) }}

                                        <span class="float-right text-danger">
                                            {{ $alerte->duree_attente  }} jour(s)
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="jumbotron bg-white text-center">
                                <h6 class="text-muted-light">Aucune alerte sur les documents reçus</h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-none">
                    <div class="card-header ui-sortable-handle">
                        <h6 class="card-title">
                            <i class="fa fa-eye mr-1"></i>
                            Consultations <br>
                            <span class="subtitle text-primary">Par type de document</span>

                        </h6>
                    </div>
                    <div class="card-body dashboard_graph" style="height: 430px">
                        <div>
                            <canvas id="myChart"  style="height: 170px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scriptBottom')
    <script>
        const labels = @json(isset($consultations['type_document']) ? $consultations['type_document'] : '') ;
        const data = {
        labels: labels,
        datasets: [{
            label: 'Nombre de documents consultables par type',
            data:  @json(isset($consultations['documents']) ? $consultations['documents'] : ''),
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            // 'rgba(255, 159, 64, 0.2)',
            // 'rgba(255, 205, 86, 0.2)',
            // 'rgba(75, 192, 192, 0.2)',
            // 'rgba(54, 162, 235, 0.2)',
            // 'rgba(153, 102, 255, 0.2)',
            // 'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            // 'rgb(255, 159, 64)',
            // 'rgb(255, 205, 86)',
            // 'rgb(75, 192, 192)',
            // 'rgb(54, 162, 235)',
            // 'rgb(153, 102, 255)',
            // 'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
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
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            userCallback: function(value, index, values) {
                                // when the floored value is the same as the value we have a whole number
                                if (Math.floor(value) === value) {
                                    return value;
                                }
                            },
                        }
                    }],
                },
            },
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );


    </script>
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])

@endsection
