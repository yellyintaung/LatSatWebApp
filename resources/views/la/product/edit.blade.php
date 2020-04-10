@extends('la.layouts.master')
@section('ModuleTitle','category Edit')
@section('contentTitle','category')
@section('visiblility','hidden')
@section('content')
<div class="p-3">
    <form class="needs-validation" action="/admin/product/{{ $product->id }}" method="post" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        
        <div class="form-group">
            <label>Image :</label><br>
            <img src="/uploads/{{ $product->product_img }}" id='img-upload' name="img" class="img-thumbnail" width="200" height="200">
        </div>
        <div class="form-group">
            <label for="image">Product Image :</label>
            <input type="file"  id="imgInp" name="product_img" class="form-control form-control-sm" style="padding-bottom:32px;">
            <input type="hidden" name="oldimage" id="logo_data" value="{{ $product->product_img }}">
        </div>
        
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Category Name:</label>
                <select name="category_id" class="form-control form-control-sm">
                    <option value=" {{ $product->category->id }} ">{{ $product->category->category_name }}</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="invalid-feedback">
                Please fill category name!
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Product Name:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="product_name" value="{{ $product->product_name }}" required>
                <div class="valid-feedback">
                    
                </div>
                <div class="invalid-feedback">
                    Please fill Product name!
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Type Name:</label>
                <select name="type_id" class="form-control form-control-sm">
                    <option value=" {{ $product->type->id }} ">{{ $product->type->type_name }}</option>
                    @foreach ($type as $item)
                    <option value="{{ $item->id }}">{{ $item->type_name }}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="invalid-feedback">
                Please fill category name!
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Price:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="price" value="{{ $product->price }}" placeholder="Enter Price" required>
                <div class="valid-feedback">
                    
                </div>
                <div class="invalid-feedback">
                    Please fill Price!
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationCustom01">Description:</label>
                <textarea type="text" class="form-control form-control-sm" cols="30" rows="3"  name="description" placeholder="Enter Price" required>{{ $product->description }}</textarea>
                <div class="valid-feedback">
                    
                </div>
                <div class="invalid-feedback">
                    Please fill Price!
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="">Hot Item :</label>
            <div class="form-check">
                <label class="form-check-label" style="width:100%;">
                    <div class="row">
                        <div class="col-md-1">
                            @if ($product->hot_item == 1 )
                            <input type="radio" class="form-check-input ml-5" name="hot_item" id="yes" value="1" checked> Yes 
                            @else
                            <input type="radio" class="form-check-input ml-5" name="hot_item" id="yes" value="1"> Yes 
                            @endif
                        </div>
                        
                        <div class="col-md-11">
                            @if ($product->hot_item == 0 )
                            <input type="radio" class="form-check-input ml-5" name="hot_item" id="no" value="0" checked>
                            No
                            @else
                            <input type="radio" class="form-check-input ml-5" name="hot_item" id="no" value="0">
                            No
                            @endif
                        </div>
                    </div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-warning float-right" style="color:black;">Update</button>
                <a href="/admin/product" class="btn btn-sm btn-danger float-right mr-2">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        
        $("#imgInp").change(function(){
            readURL(this);
        }); 
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                
                $('#logo_data').val(e.target.result);
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
