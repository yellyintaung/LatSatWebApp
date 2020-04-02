@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">Product View</h3>
</div>
@endsection
@section('content')

<div class="p-3">
    <div class="row mb-3">
        <div class="col-md-4">
            <label>Customer Name:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->payment->pcustomer->name }}" readonly>
        </div>
        
        <div class="col-md-4">
            <label>Phone Number:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->payment->pcustomer->phone }}" readonly>
        </div>
        <div class="col-md-4">
            <label>Township:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->payment->township }}" readonly>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-12">
            <label>Address:</label>
            <textarea class="form-control form-control-sm" readonly>{{ $order->payment->address }}</textarea>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-4">
            <label>Product Name:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->product->product_name }}" readonly>
        </div>
        
        <div class="col-md-4">
            <label>Product Quantity:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->quantity }}" readonly>
        </div>
        <div class="col-md-4">
            <label>Price Per Each:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->pricepereach }}" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label>Amount:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->total_amount }}" readonly>
        </div>
        
        <div class="col-md-6">
            <label>Order Date:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->payment->created_at }}" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label>Want Date:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->payment->want_date }}" readonly>
        </div>
        
        <div class="col-md-6">
            <label>Product Quantity:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $order->payment->time }}" readonly>
        </div>
    </div>
    
    <a href="/admin/order" class="btn btn-sm mr-2" style="background-color:#fff;border-color:red;color:black;"><i class="fas fa-angle-double-left"></i>&nbsp;Back</a>
    <div class="float-right">
        
        {{-- <a href="/admin/order/{{ $order->payment->id }}/edit" class="btn btn-sm mr-2" style="background-color:#FFC107;color:black;width:4.5em;">Edit</a> --}}
        
        
        <form action="/admin/order/{{ $order->payment->id }}" method="post" class="d-inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        
    </div>
</div>
@endsection