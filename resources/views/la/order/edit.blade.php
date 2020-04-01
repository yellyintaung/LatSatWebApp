@extends('la.layouts.master')
@section('ModuleTitle','Order Edit')
@section('contentTitle','Order')
@section('visiblility','hidden')
@section('content')
<div class="p-3">
    <form class="needs-validation" action="/admin/order/{{ $order->id }}" method="post" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        
        <div class="form-group">
            <label for="">Delivery Status :</label>
            <div class="form-check">
                <label class="form-check-label" style="width:100%;">
                    <div class="row">
                        <div class="col-md-1">
                            @if ($order->status == 1 )
                            <input type="radio" class="form-check-input ml-5" name="status" id="yes" value="1" checked> Done 
                            @else
                            <input type="radio" class="form-check-input ml-5" name="status" id="yes" value="1"> Done
                            @endif
                        </div>
                        
                        <div class="col-md-11">
                            @if ($order->status == 0 )
                            <input type="radio" class="form-check-input ml-5" name="status" id="no" value="0" checked>
                            Not Yet
                            @else
                            <input type="radio" class="form-check-input ml-5" name="status" id="no" value="0">
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
                <a href="/admin/order" class="btn btn-sm btn-danger float-right mr-2">Cancel</a>
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
