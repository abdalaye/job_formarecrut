<table class="table table-striped table-hover table-sm table-borderless" id="{{ isset($id) ? $id : 'datatable' }}" width="100%">
    <thead>
        @yield('tableHeader')
    </thead>

    <tbody>
        @yield('tableBody')
    </tbody>
</table>
