@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">item List</h3>
    {{-- <a href="/admin/item/create" class="btn btn-sm btn-success float-right" style="visibility:visibile;"><i class="fas fa-plus"></i> ADD</a> --}}
   
  </div>
@endsection
@section('content')
<div class="container-fluid p-3">
<table id="item-table" class="table table-sm table-hover text-nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Total Amount</th>
            <th>Order Date</th>
            <th>Want Date</th>
            <th>Time</th>
            <th>Delivery</th>
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
       
        @foreach ($payment as $key=>$item)
        <tr>
            <td> {{ ($tno*10)+$key+1 }} </td>
            <td>{{ $item->pcustomer->name }}</td>
            <td>{{ $item->total }} ကျပ်</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->want_date }}</td>
            <td>{{ $item->time }}</td>
            <td >
                @if ($item->status == 1 )
                <label class="font-weight-bold btn-sm btn-light text-success active text-center" style="width:80%;">
                    Done
                </label>
                @else
                <label class="font-weight-bold btn-sm btn-light text-danger active text-center" style="width:80%;">
                    Not Yet
                </label>
                @endif
            </td>
            <td>
                <a href="/admin/payment/{{ $item->id }}" class="btn btn-sm" style="background-color:#007BFF;color:white;">View</a>
                
                <a href="/admin/item/{{ $item->id }}/edit" class="btn btn-sm" style="background-color:#FFC107;color:black;">Edit</a>
                
                <form action="/admin/payment/{{ $item->id }}" method="post" class="d-inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button item="submit" class="btn btn-sm btn-danger demo" onclick="return confirm('Are you sure?')">Delete</button>
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
    $('#item-table').DataTable();
    console.log("Ready");
} );
</script>
@endpush