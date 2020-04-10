@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">Township View</h3>
</div>
@endsection
@section('content')
<div class="p-3">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label>Township Name:</label>
                <input type="text" class="form-control form-control-sm" value="{{ $township->township_name }}" readonly>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Delivery Cost:</label>
                <input type="text" class="form-control form-control-sm" value="{{ $township->delivery_cost }}" readonly>
            </div>
        </div>
    </div>
    
    
    
    <a href="/admin/township" class="btn btn-sm mr-2" style="background-color:#fff;border-color:red;color:black;"><i class="fas fa-angle-double-left"></i>&nbsp;Back</a>
    <div class="float-right">
        
        <a href="/admin/township/{{ $township->id }}/edit" class="btn btn-sm mr-2" style="background-color:#FFC107;color:black;width:4.5em;">Edit</a>
        
        
        <form action="/admin/township/{{ $township->id }}" method="post" class="d-inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        
    </div>
</div>
@endsection