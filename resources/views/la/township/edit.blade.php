@extends('la.layouts.master')
@section('ModuleTitle','township Edit')
@section('contentTitle','township')
@section('visiblility','hidden')
@section('content')
<div class="p-3">
    <form class="needs-validation" action="/admin/township/{{ $township->id }}" method="post" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Township Name:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="township_name" value="{{ $township->township_name }}" required>
                <div class="valid-feedback">

                </div>
                <div class="invalid-feedback">
                    Please fill Township name!
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Delivery Cost:</label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="delivery_cost" value="{{ $township->delivery_cost }}" required>
                <div class="valid-feedback">

                </div>
                <div class="invalid-feedback">
                    Please fill Delivery Cost!
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Service Info :</label>
            <div class="form-check">
                <label class="form-check-label" style="width:100%;">
                    <div class="row">
                        <div class="col-md-1">
                            @if ($township->t_status == 0 )
                            <input type="radio" class="form-check-input ml-5" name="t_status" id="yes" value="0" checked> Service 
                            @else
                            <input type="radio" class="form-check-input ml-5" name="t_status" id="yes" value="0"> Service
                            @endif
                        </div>
                        
                        <div class="col-md-11">
                            @if ($township->t_status == 1 )
                            <input type="radio" class="form-check-input ml-5" name="t_status" id="no" value="1" checked>
                            Not Yet
                            @else
                            <input type="radio" class="form-check-input ml-5" name="t_status" id="no" value="1">
                            Not Yet
                            @endif
                        </div>
                    </div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-warning float-right" style="color:black;">Update</button>
                <a href="/admin/township" class="btn btn-sm btn-danger float-right mr-2">Cancel</a>
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
                var validation = Array.prototownship.filter.call(forms, function(form) {
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
