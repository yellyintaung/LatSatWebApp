@extends('la.layouts.master')
@section('card_header')
<div class="card-header">
    <h3 class="card-title pt-2 text-uppercase">Product View</h3>
</div>
@endsection
@section('content')

<div class="p-3">
    <div class="form-group">
        <label>Image :</label><br>
        <img src="/uploads/{{ $product->product_img}}" class="img-thumbnail" width="200" height="200">
    </div>
    
    <div class="form-group">
        <label>Category Name:</label>
        <input type="text" class="form-control form-control-sm" value="{{ $product->category->category_name }}" readonly>
    </div>
    
    <div class="form-group">
        <label>Product Name:</label>
        <input type="text" class="form-control form-control-sm" value="{{ $product->product_name }}" readonly>
    </div>
    
    
    
    <div class="form-group">
        <label>Price:</label>
        <input type="text" class="form-control form-control-sm" value="{{ $product->price }}" readonly>
    </div>
    
    <div class="form-group">
        <label>Description:</label>
        <textarea class="form-control form-control-sm" readonly>{{ $product->description }}</textarea>
    </div>
    
    <div class="form-group">
        <label>Hot Item :</label><br>
        @if ($product->hot_item == 1 )
        <label class="font-weight-bold btn-sm btn-light text-success active text-center" style="width:10%;">
            Yes
        </label>
        @else
        <label class="font-weight-bold btn-sm btn-light text-danger active text-center" style="width:10%;">
            No
        </label>
        @endif
    </div>
    
    <a href="/admin/product" class="btn btn-sm mr-2" style="background-color:#fff;border-color:red;color:black;"><i class="fas fa-angle-double-left"></i>&nbsp;Back</a>
    <div class="float-right">
        
        <a href="/admin/product/{{ $product->id }}/edit" class="btn btn-sm mr-2" style="background-color:#FFC107;color:black;width:4.5em;">Edit</a>
        
        
        <form action="/admin/product/{{ $product->id }}" method="post" class="d-inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        
    </div>
</div>
@endsection