@extends('frontend.master')
@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
@endpush
@section('content')

<section style="padding-top:30px;">
        
    <div class="container">
        <div class="card detail-card mb-3" style="width: 100%;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="/uploads/{{ $product->product_img }}" alt="" style="width: 100%;padding:20px;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title default-color font-weight-bold">{{ $product->product_name }}</h5>
                  <p class="card-text">
                    {{ $product->description }}
                    </p>
                    <p class="card-text m-0 pb-1">{{ $product->type->type_name }} - {{ $product->price }}ကျပ်</p>
                    <h6 class="default-color font-weight-bold pt-2">အရေအတွက်</h6>
                    <div class="wrap w-100 pt-1">
                        <button type="button" id="sub" class="sub">-</button>
                        <input class="count pl-2 txt-qy" id="count" type="text" value="1" min="1" max="1000"  style="width:50%;" />
                        <button type="button" id="plus" class="plus">+</button>
                    </div>
                    <a class="btn btn-sm btn-add add text-white mt-3" style="cursor:pointer;" data-id="{{ $product->id }}">စျေးခြင်းသို့ထည့်မည်</a>
                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger text-white mt-3 float-right">နောက်သို့</a>
                </div>
              </div>
            </div>
          </div>
    </div>      
        
</section>
@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {
        
        $('.plus').click(function () {		
            var th = $(this).closest('.wrap').find('.count');    	
            th.val(+th.val() + 1);
        });
        $('.sub').click(function () {
            var th = $(this).closest('.wrap').find('.count');    	
            if (th.val() > 1) th.val(+th.val() - 1);
        });
        $('.btn-add').click(function(){
            var id=$(this).data("id");
            var count=$('#count').val();
            $.ajax({
                url:'/add_cart',
                type:'get',                                                                           
                data:{'id':id,'qty':count},
                success:function(data){
                    console.log(data);
                    showCart();
                }
            });
        });
        
        $('.txt-qy').keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
        
    });
</script>
@endpush