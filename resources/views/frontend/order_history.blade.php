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
        <img src="/images/order.png" alt="product" width="100%">
        
        
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
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th scope="col">အရေအတွက်</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th scope="col">စုစုပေါင်းတန်ဖိုး</th>
                        <th scope="col"></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cpayment->porder as $item)
                    {{-- {{dd($item)}} --}}
                    <tr class="cart-tr">
                        <th scope="row"><img src="../uploads/{{ $item->product->product_img }}" alt="laptops" class="headset" style="width:50px;" /></th>
                        <td colspan="5">
                            <div  style="padding-top:10px;">{{ $item->product->product_name }} </div>
                        </td>
                        <td colspan="6">
                            <div  style="padding-top:10px;">
                                <input type="hidden" class=" price{{ $item->id }} " value="{{ $item->pricepereach }}">
                                {{ $item->type}} -{{ $item->pricepereach }}ကျပ်
                            </div>
                        </td>
                        <td colspan="5">
                            {{-- {{ dd($item->qty) }} --}}
                            <div class="info wrap s-cart" style="padding-top:10px;">
                                {{-- <button type="button" id="sub"  class="sub btn-minus" data-id="{{ $item->id }}">-</button> --}}
                                {{-- <input class="count pl-2 qty{{ $item->id }} txt-qty" data-id="{{ $item->id }}" id="count" type="text" value="{{ $item->quantity }}" style="text-align:center; min="1" max="1000" /> --}}
                                <p>{{ $item->quantity }} </p>
                                {{-- <button type="button" id="plus" class="plus btn-plus" data-id="{{ $item->id }}">+</button> --}}
                            </div>
                        </td>
                        <td>
                            <div class="info" style="padding-top:10px;"><span class="total{{$item->id}}">{{ $item->total_amount }}</span>ကျပ်</div>
                        </td>
                        <td>
                            {{-- <form action="/shoppingCartdelete" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->__raw_id}}">
                                <button class="info" onclick="return confirm('Are you sure?')" style="margin-top:0.7em;background:none;border:none;"><i class="fas fa-trash-alt"></i></button>
                            </form>  --}}
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        
        <div class="row pb-3">
            <div class="col-6">
                
            </div>
            <div class="col-3 pt-2">
                <h6 class="info" style="font-size:18px;">ကျသင့်ငွေ</h6>
            </div>
            <div class="col-3 pt-2">
                <h6 class="info" style="font-size:18px;position:absolute;" id="totalPrice">{{ $cpayment->total }}ကျပ်</h6>
            </div>
        </div>
        
        {{-- <div class="row">
            <div class="col-6">
                
            </div>
            <div class="col-3 pt-2">
                <h6 class="info" style="font-size:18px;">စုစုပေါင်းကျသင့်ငွေ</h6>
            </div>
            <div class="col-3 pt-2">
                <h6 class="info" style="font-size:18px;position:absolute;" id="totalPriceDone">{{ $total+650 }}ကျပ်</h6>
            </div>
        </div> --}}
        <div class="row pt-5">
            <div class="col-md-9 col-xs-12 c-shop">
                <a href="/" class="btn con-shop">‌နောက်သို့ >> </a>
            </div>
            {{-- <div class="col-md-3 col-xs-12">
                <a href="/check_user" class="btn check text-white" style="width:100%;background:#32B34A;">အော်ဒါတင်ရန်ဆက်သွားမည်</a>
            </div> --}}
        </div><br><br>
    </div>
</section>
@endsection
@push('scripts')
<script>
    
    $(document).ready(function(){            
        function calculate(id,qty,price) {

            var total = qty*price;
            console.log("total :"+total);
            $('.total'+id).html(total);
            
            $.ajax({
                    type:'get',
                    url:'/orderUpdate/'+total,
                    success:function(data){ 
                        console.log(data);
                        $('#totalPrice').html(data.itemTotal+'ကျပ်');
                        // $('#totalPriceDone').html(data.total+'ကျပ်');
                    }
                });
        

        }
        
        
        $('.btn-minus').click(function(){
            var id=$(this).data("id");
            var qty=$('.qty'+id).val();
            if(qty>1){
                $('.qty'+id).val(qty-1);
                var price=$('.price'+id).val();
                calculate(id,qty-1,price);
            }
        }); 
        
        $('.btn-plus').click(function(){
            var id=$(this).data("id");
            var qty=$('.qty'+id).val();
            qty=parseInt(qty);
            $('.qty'+id).val(qty+1);
            var price=$('.price'+id).val();
            calculate(id,qty+1,price);
        }); 
        
        $('.txt-qty').keyup(function() {
            var id=$(this).data("id");
            var qty=$('.qty'+id).val();
            var price=$('.price'+id).val();
            calculate(id,qty,price);
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