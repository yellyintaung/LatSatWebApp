@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">Product View</h3>
</div>
@endsection
@section('content')

<div class="p-3">
    <div class="row mb-3">
        <div class="col-md-6">
            <label>Customer Name:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $customer->name }}" readonly>
        </div>
        
        <div class="col-md-6">
            <label>Phone Number:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $customer->phone }}" readonly>
        </div>
    </div>
    
    {{-- <div class="row mb-3"> --}}
        {{-- <div class="col-md-6">
            <label>Region:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $customer->region }}" readonly>
        </div> --}}
        
        {{-- <div class="col-md-6">
            <label>Township:</label>
            <input type="text" class="form-control form-control-sm" value="{{ $customer->township }}" readonly>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-12">
            <label>Address:</label>
            <textarea class="form-control form-control-sm" readonly>{{ $customer->address }}</textarea>
        </div>
    </div> --}}
    
    
    <a href="/admin/customer" class="btn btn-sm mr-2" style="background-color:#fff;border-color:red;color:black;"><i class="fas fa-angle-double-left"></i>&nbsp;Back</a>
    <div class="float-right">
        
        {{-- <a href="/admin/customer/{{ $customer->id }}/edit" class="btn btn-sm mr-2" style="background-color:#FFC107;color:black;width:4.5em;">Edit</a> --}}
        
        
        {{-- <form action="/admin/customer/{{ $customer->id }}" method="post" class="d-inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form> --}}
        
    </div>
</div>
@endsection