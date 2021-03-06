@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">product List</h3>
    <a href="/admin/product/create" class="btn btn-sm btn-success float-right" style="visibility:visibile;"><i class="fas fa-plus"></i> ADD</a>
   
  </div>
@endsection
@section('content')
<div class="container-fluid p-3">
<table id="region-table" class="table table-sm table-hover text-nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Hot Item</th>
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
        {{-- {{ dd($product) }} --}}
        @foreach ($product as $key=>$item)
        <tr>
            <td> {{ ($rno*10)+$key+1 }} </td>
            <td>{{ isset($item->category)?$item->category->category_name:"" }}</td>
            <td>{{ $item->product_img }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ isset($item->type)?$item->type->type_name:"" }}</td>
            <td>{{ $item->price }}</td>
            <td >
                @if ($item->hot_item == 1 )
                <label class="font-weight-bold btn-sm btn-light text-success active text-center" style="width:80%;">
                    Yes
                </label>
                @else
                <label class="font-weight-bold btn-sm btn-light text-danger active text-center" style="width:80%;">
                    No
                </label>
                @endif
            </td>
            <td>
                <a href="/admin/product/{{ $item->id }}" class="btn btn-sm" style="background-color:#007BFF;color:white;">View</a>
                
                <a href="/admin/product/{{ $item->id }}/edit" class="btn btn-sm" style="background-color:#FFC107;color:black;">Edit</a>
                
                <form action="/admin/product/{{ $item->id }}" method="post" class="d-inline">
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