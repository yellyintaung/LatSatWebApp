@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">Order List</h3>
    {{-- <a href="/admin/order/create" class="btn btn-sm btn-success float-right" style="visibility:visibile;"><i class="fas fa-plus"></i> ADD</a> --}}
   
  </div>
@endsection
@section('content')
<div class="container-fluid p-3">
<table id="region-table" class="table table-sm table-hover text-nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Oder Date</th>
            <th>Want Date</th>
            <th>Want Time</th>
            <th>Delivery</th>
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
        @foreach ($order as $key=>$item)
        <tr>
            <td> {{ ($cno*10)+$key+1 }} </td>
            <td>{{ $item->payment->pcustomer->name }}</td>
            <td>{{ $item->product->product_name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->total_amount }} ကျပ်</td>
           
            <td>{{ $item->payment->created_at }}</td>
            <td>{{ $item->payment->want_date }}</td>
            <td>{{ $item->payment->time }}</td>
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
                <a href="/admin/order/{{ $item->id }}" class="btn btn-sm" style="background-color:#007BFF;color:white;">View</a>
                
                <a href="/admin/order/{{ $item->id }}/edit" class="btn btn-sm" style="background-color:#FFC107;color:black;">Edit</a>
                
                <form action="/admin/order/{{ $item->id }}" method="post" class="d-inline">
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