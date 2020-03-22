@extends('la.layouts.master')
@section('ModuleTitle','category Edit')
@section('contentTitle','category')
@section('visiblility','hidden')
@section('content')
<div class="p-3">
    <form class="needs-validation" action="/admin/category/{{ $category->id }}" method="post" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationCustom01">Category Name:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="category_name" value="{{ $category->category_name }}" required>
                <div class="valid-feedback">

                </div>
                <div class="invalid-feedback">
                    Please fill category name!
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Image :</label><br>
            <img src="/uploads/{{ $category->image }}" id='img-upload' name="img" class="img-thumbnail" width="200" height="200">
        </div>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file"  id="imgInp" name="img" class="form-control form-control-sm" style="padding-bottom:32px;">
            <input type="hidden" name="oldimage" id="logo_data" value="{{ $category->image }}">
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-warning float-right" style="color:black;">Update</button>
                <a href="/admin/category" class="btn btn-sm btn-danger float-right mr-2">Cancel</a>
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
