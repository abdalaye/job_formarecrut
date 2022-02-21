<div class="row">
    <div class="col-md-8 col-lg-8" >
        <!-- Collapsable Card Example -->
        <div class="card mb-4 shadow-none">
            <!-- Card Content - Collapse -->
            <div class="card-header">
                <h3 class="card-title">Statistiques par type de documents</h3>
            </div>
            <div class="card-body dashboard_graph" style="height: 346px;overflow: hidden;overflow-y: auto;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm table-borderless" id="{{ isset($id) ? $id : 'datatable' }}" width="100%">
                                <thead>
                                    <tr>
                                        <th>Type Documents</th>
                                        <th>Nombre de documents</th>
                                        <th>Duree Moy. Trait. sur un document</th>
                                        <th>Durée moy. par collaborateur</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(isset($type_documents))
                                        @foreach ($type_documents as $type)
                                            <tr class="text-capitalize">
                                                <td>{{ $type->name }}</td>
                                                <td>{{ count($type->documents()->clotures()->get()) }}</td>
                                                <td>{{ round($type->statistiques()['duree_moyenne_documents'],2) }}</td>
                                                <td>{{ round($type->statistiques()['duree_moyenne_validations'],2) }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="card shadow-none" >
            <div class="card-header">
                <h3 class="card-title">Nombre de documents par type</h3>
            </div>
            <div class="card-body dashboard_graph" style="height: 346px" >
                <div>
                    <canvas id="myDoughnut"  style="height: 100px !important"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow-none" >
            <div class="card-header">
                <h3 class="card-title">Nombre de documents traités par type de document</h3>
            </div>
            <div class="card-body dashboard_graph">
                <div>
                    <canvas id="myChart"  style="height: 170px !important"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

