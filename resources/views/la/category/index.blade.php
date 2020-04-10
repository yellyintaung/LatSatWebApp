@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">Category List</h3>
    <a href="/admin/category/create" class="btn btn-sm btn-success float-right" style="visibility:visibile;"><i class="fas fa-plus"></i> ADD</a>
   
  </div>
@endsection
@section('content')
<div class="container-fluid p-3">
<table id="region-table" class="table table-sm table-hover text-nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Logo</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table_body">
        <?php
       if (isset($_GET['page'])) {
            $rno =  $_GET['page'];
            $rno=$rno<1?$rno=0:$rno-1;
        } else {
            $rno = 0;
        }
        ?>
        @foreach ($categories as $key=>$category)
        <tr>
            <td> {{ ($rno*10)+$key+1 }} </td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->logo }}</td>
            <td>{{ $category->image }}</td>
            <td>
                <a href="/admin/category/{{ $category->id }}" class="btn btn-sm" style="background-color:#007BFF;color:white;">View</a>
                
                <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-sm" style="background-color:#FFC107;color:black;">Edit</a>
                
                <form action="/admin/category/{{ $category->id }}" method="post" class="d-inline">
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
    $('#region-table').DataTable();
    console.log("Ready");
} );
</script>
@endpush