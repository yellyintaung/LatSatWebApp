@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">type List</h3>
    <a href="/admin/type/create" class="btn btn-sm btn-success float-right" style="visibility:visibile;"><i class="fas fa-plus"></i> ADD</a>
   
  </div>
@endsection
@section('content')
<div class="container-fluid p-3">
<table id="type-table" class="table table-sm table-hover text-nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th>Type Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table_body">
        <?php
       if (isset($_GET['page'])) {
            $tno =  $_GET['page'];
            $tno=$tno<1?$tno=0:$tno-1;
        } else {
            $tno = 0;
        }
        ?>
       
        @foreach ($types as $key=>$type)
        <tr>
            <td> {{ ($tno*10)+$key+1 }} </td>
            <td>{{ $type->type_name }}</td>
            <td>
                <a href="/admin/type/{{ $type->id }}" class="btn btn-sm" style="background-color:#007BFF;color:white;">View</a>
                
                <a href="/admin/type/{{ $type->id }}/edit" class="btn btn-sm" style="background-color:#FFC107;color:black;">Edit</a>
                
                <form action="/admin/type/{{ $type->id }}" method="post" class="d-inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-sm btn-danger demo" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach   
    </tbody>
</table>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
    $('#type-table').DataTable();
    console.log("Ready");
} );
</script>
@endpush