@extends('frontend.master')
@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
@endpush
@section('content')

<section class="shoppingCart">
    <div class="container">
        <div class="breadcrumb mt-3 mb-4" style="background: #32B34A;">
            <h5 class="text-white font-weight-bold">User Register Form</h5>   
        </div>
        
        <form action="/registercheck" method="post" style="border: 1px solid #32B34A;" class="p-3">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">အမည်</label>
                    <input type="text" name="name"  class="form-control" id="inputEmail4" placeholder="Enter Name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">စကား၀ှက်</label>
                    <input type="password" name="password"  class="form-control" id="inputEmail4" placeholder="Enter Password" required>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="inputPassword4">ဖုန်းနံပါတ်</label>
                    <input type="text" name="phone" class="form-control" id="inputPassword4" placeholder="Enter Phone Number" required>
                </div>
            </div>
                
            
            {{-- <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Want Date</label>
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="want_date"/>
                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Want Time</label>
                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="time"/>
                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
            <div class="text-right">
                <button type="submit" class="btn btn-add text-white" onclick="return alert('Your Registration is Successful!')">Register</button>
            </div>

            
            
        </form>
    </div>
    
    
    <!-- The Modal -->
    
    @endsection
    @push('scripts')
    
    
    {{-- <script type="text/javascript">
        
        $(function () {
            $('#datetimepicker4').datetimepicker({
                format: 'D/MM/YYYY'
                
            });
        });
        
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
        
    </script> --}}
    @endpush