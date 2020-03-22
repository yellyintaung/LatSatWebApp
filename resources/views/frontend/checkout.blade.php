@extends('frontend.master')
@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
@endpush
@section('content')

<section class="shoppingCart">
    <div class="container">
        <div class="breadcrumb mt-3 mb-4" style="background: #32B34A;">
            <h5 class="text-white font-weight-bold">Checkout</h5>   
        </div>
        
        <form action="/placeOrder" method="post" style="border: 1px solid #32B34A;" class="p-3">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="text" name="name"  class="form-control" id="inputEmail4" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Phone</label>
                    <input type="text" name="phone" class="form-control" id="inputPassword4" placeholder="Phone Number">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Region</label>
                    <input type="text" name="region" class="form-control" id="inputEmail4" placeholder="region">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Township</label>
                    <input type="text" name="township" class="form-control" id="inputPassword4" placeholder="Township">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address</label>
                <textarea class="form-control" name="address" cols="30" rows="3" ></textarea> 
            </div>
            
            <div class="text-right">
                <button type="submit" class="btn btn-add text-white">Place Order</button>
            </div>
        </form>
    </div>
</section>

@endsection
@push('script')
<script>
    $(document).ready(function () {
        $(function () {
            $('.pcheck').click(function () {
                $('#off').prop('disabled', !$('.pcheck:checked').length);
            });
        });
    });
</script>
@endpush