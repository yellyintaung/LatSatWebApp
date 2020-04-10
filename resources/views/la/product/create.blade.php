@extends('la.layouts.master')

@section('ModuleTitle','product Add')
@section('contentTitle','product')
@section('visiblility','hidden')
@section('content')
<div class="p-3">
    <form class="needs-validation" action="/admin/product" method="post" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Category Name:</label>
                <select name="category_id" class="form-control form-control-sm">
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="invalid-feedback">
                Please fill Category name!
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Product Name:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="product_name" placeholder="Enter product name" required>
                <div class="valid-feedback">
                    
                </div>
                <div class="invalid-feedback">
                    Please fill product name!
                </div>
            </div>  
            
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Type:</label>
                <select name="type_id" class="form-control form-control-sm">
                    @foreach ($type as $item)
                    <option value="{{ $item->id }}">{{ $item->type_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="invalid-feedback">
                Please fill Category name!
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Price:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="price" placeholder="Enter Price" required>
                <div class="valid-feedback">
                    
                </div>
                <div class="invalid-feedback">
                    Please fill Price!
                </div>
            </div>
           
        </div> 
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Product Image:</label>
                <input type="file" name="product_img" class="form-control form-control-sm" id="image" style="padding-bottom: 30px;">
            </div>
            <div class="invalid-feedback">
                Please choose image!
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationCustom01">Description:</label>
                <textarea class="form-control form-control-sm" name="description" cols="30" rows="3" ></textarea> 
            </div>
        </div>
        
        <div class="form-group">
            <label for="">Hot Item :</label>
            <div class="form-check">
                <label class="form-check-label" style="width:100%;">
                    <div class="row">
                        <div class="col-md-1">
                            <input type="radio" class="form-check-input ml-5" name="hot_item" id="yes" value="1" checked> Yes
                        </div>
                        
                        <div class="col-md-11">
                            <input type="radio" class="form-check-input ml-5" name="hot_item" id="no" value="0">
                            No
                        </div>
                    </div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-success float-right">Save</button>
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger float-right mr-2">Cancel</a>
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
    });
</script>
@endpush

{{-- <div class="col-md-6 mb-3">
    <label for="validationCustom01">Image :</label>
    <input type="file" class="form-control form-control-sm" id="validationCustom01" name="image" style="padding-bottom: 35px" required>
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
        Please Select Image!
    </div>
</div> --}}