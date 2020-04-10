@extends('la.layouts.master')

@section('ModuleTitle','type Add')
@section('contentTitle','type')
@section('visiblility','hidden')
@section('content')
<div class="p-3">
    <form class="needs-validation" action="/admin/type" method="post" novalidate>
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationCustom01">Type Name:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="type_name" placeholder="Enter Type name" required>
                <div class="valid-feedback">
                    
                </div>
                <div class="invalid-feedback">
                    Please fill Type name!
                </div>
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
