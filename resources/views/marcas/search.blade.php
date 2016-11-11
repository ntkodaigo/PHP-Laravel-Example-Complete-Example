@extends('layout')
    
@section('content')
    <table class="table table-bordered" id="marca-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre de la Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#marca-table').DataTable({
        processing: true,
        serverSide: true,
        ajax:'{{URL::asset('data')}}',
        columns: [
            { data: 'idmarca', name: 'idmarca' },
            { data: 'nombremarca', name: 'nombremarca' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
