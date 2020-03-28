@extends('frontend.master')
@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
@endpush
@section('content')

<section class="shoppingCart">
    <div class="container">
        {{-- <div class="breadcrumb mt-3" style="background: #32B34A;">
            <h5 class="text-white font-weight-bold">Your Shopping Cart</h5>   
        </div> --}}
        <img src="/images/shopping.png" alt="product" width="100%">

        <h6 class="info pt-3" style="font-size:20px;text-align:right;">
            <span style="color:#32B34A">{{ $rows }}</span> products in cart</h6>
            
            <div class="table-responsive pt-4">
                <table class="table table-borderless">
                    <thead class="cart-header">
                        <tr>
                            <th scope="col">ပစ္စည်း</th>
                            <th scope="col">အမည်</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th scope="col">ဈေးနှုန်း</th>
                            <th scope="col">အရေအတွက်</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th scope="col">စုစုပေါင်းတန်ဖိုး</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                        <tr class="cart-tr">
                            <th scope="row"><img src="../uploads/{{ $item->product_img }}" alt="laptops" class="headset" style="width:150px;" /></th>
                            <td colspan="5">
                                <div  style="padding-top:28px;">{{ $item->name }} </div>
                            </td>
                            <td>
                                <div  style="padding-top:28px;">
                                    <input type="hidden" class=" price{{ $item->id }} " value="{{ $item->price }}">
                                    {{ $item->price }}ကျပ်
                                </div>
                            </td>
                            <td colspan="7">
                                <div class="info wrap s-cart" style="padding-top:25px;">
                                    <button type="button" id="sub"  class="sub btn-minus" data-id="{{ $item->id }}" data-rawid="{{ $item->__raw_id}}">-</button>
                                    <input class="count pl-2 qty{{ $item->id }} txt-qty" data-id="{{ $item->id }}"
                                    data-rawid="{{ $item->__raw_id}}" id="count" type="text" value="{{ $item->qty }}" style="text-align:center; min="1" max="1000" />{{ $item->type_name }}
                                    <button type="button" id="plus" class="plus btn-plus" data-id="{{ $item->id }}" data-rawid="{{ $item->__raw_id}}">+</button>
                                </div>
                            </td>
                            <td>
                                <div class="info" style="padding-top:30px;"><span class="total{{$item->id}}">{{ $item->qty*$item->price }}</span>ကျပ်</div>
                            </td>
                            <td>
                                <form action="/shoppingCartdelete" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $item->__raw_id}}">
                                    <button class="info" onclick="return confirm('Are you sure?')" style="margin-top:1.8em;background:none;border:none;"><i class="fas fa-trash-alt"></i></button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            
            <div class="row">
                <div class="col-md-9 col-xs-12">
                    
                </div>
                <div class="col-md-2 col-xs-12 pt-2">
                    <h6 class="info" style="font-size:18px;">ကျသင့်ငွေ</h6>
                </div>
                <div class="col-md-1 col-xs-12 pt-2">
                    <h6 class="info" style="font-size:18px;position:absolute;" id="totalPrice">{{ $total }}ကျပ်</h6>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-9 col-xs-12 c-shop">
                    <a href="/" class="btn con-shop">ဝယ်ဦးမယ် >> </a>
                </div>
                <div class="col-md-3 col-xs-12">
                    <a href="/showCheckoutview" class="btn check text-white" style="width:100%;background:#32B34A;">အော်ဒါတင်ရန်</a>
                </div>
            </div><br><br>
        </div>
    </section>
    @endsection
    @push('scripts')
    <script>
        function calculate(rawId,id,qty,price) {
            var total = qty*price;
            console.log("total :"+total);
            $('.total'+id).html(total);
            $.ajax({
                type:'get',
                url:'/shoppingCartUpdate/'+rawId+'/'+qty,
                success:function(data){
                    console.log(data);
                    $('.total'+id).html(data.item.total);
                    $('#totalPrice').html(data.total+'ကျပ်');
                }
            });
        }
        $(document).ready(function(){
            $('.btn-minus').click(function(){
                var id=$(this).data("id");
                var rawId=$(this).data("rawid");
                var qty=$('.qty'+id).val();
                if(qty>1){
                    $('.qty'+id).val(qty-1);
                    var price=$('.price'+id).val();
                    calculate(rawId,id,qty-1,price);
                }
            }); 
            
            $('.btn-plus').click(function(){
                var id=$(this).data("id");
                var rawId=$(this).data("rawid");
                console.log("Raw ID : "+rawId);
                var qty=$('.qty'+id).val();
                qty=parseInt(qty);
                $('.qty'+id).val(qty+1);
                var price=$('.price'+id).val();
                calculate(rawId,id,qty+1,price);
            }); 
            
            $('.txt-qty').keyup(function() {
                var id=$(this).data("id");
                var rawId=$(this).data("rawid");
                console.log("Raw ID : "+rawId);
                var qty=$('.qty'+id).val();
                var price=$('.price'+id).val();
                calculate(rawId,id,qty,price);
            });
            
            $('.txt-qty').keypress(function (e) {
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