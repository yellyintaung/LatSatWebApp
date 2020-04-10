@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">Customer List</h3>
    <a href="/admin/customer/create" class="btn btn-sm btn-success float-right" style="visibility:visibile;"><i class="fas fa-plus"></i> ADD</a>
   
  </div>
@endsection
@section('content')
<div class="container-fluid p-3">
<table id="region-table" class="table table-sm table-hover text-nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Phone Number</th>
            {{-- <th>Region</th> --}}
            <th>Township</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table_body">
        <?php
       if (isset($_GET['page'])) {
            $cno =  $_GET['page'];
            $cno=$cno<1?$cno=0:$cno-1;
        } else {
            $cno = 0;
        }
        ?>
        {{-- {{ dd($customer) }} --}}
        @foreach ($customer as $key=>$item)
        <tr>
            <td> {{ ($cno*10)+$key+1 }} </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->phone }}</td>
            {{-- <td>{{ $item->region }}</td> --}}
            <td>{{ $item->township }}</td>
            <td>
                <a href="/admin/customer/{{ $item->id }}" class="btn btn-sm" style="background-color:#007BFF;color:white;">View</a>
                
                {{-- <a href="/admin/customer/{{ $item->id }}/edit" class="btn btn-sm" style="background-color:#FFC107;color:black;">Edit</a> --}}
                
                <form action="/admin/customer/{{ $item->id }}" method="post" class="d-inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-sm btn-danger demo" onclick="return confirm('Are you sure?')" disabled>Delete</button>
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
    $('#region-table').DataTable();
    console.log("Ready");
} );
</script>
@endpush