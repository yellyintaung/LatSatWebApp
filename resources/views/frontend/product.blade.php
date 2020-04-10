@extends('frontend.master')
@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">

<style>
    /* .animate {
        margin-right: 0.5rem !important
    }
    
    .animate {
        font-size: 0.875rem;
        line-height: 1;
        font-weight: 400;
        padding: .7rem 1.5rem;
        border-radius: 0.1275rem
    } */
    
    .toast {
        transition: 0.32s all ease-in-out
    }
    
    .toast-container--fade {
        right: 0;
        bottom: 0
    }
    
    .toast-container--fade .toast-wrapper {
        display: inline-block
    }
    
    .toast.fade-init {
        opacity: 0
    }
    
    .toast.fade-show {
        opacity: 1
    }
    
    .toast.fade-hide {
        opacity: 0
    }
</style>
@endpush

@section('content')

<section>
    
    <div class="container">
        <img src="/uploads/{{ $category->image }}" alt="product" width="100%">
        {{-- <div class="mob-product">
           
            <div class="breadcrumb caption mt-3">
                <h4 class="font-weight-bold text-center" style="font-size:21px;">{{ $category->category_name }}</h4>   
            </div>
        </div> --}}
        
        <section class="py-4">
        @foreach ($category->product->chunk(4) as $chunk)
        <div class="row mob-row">
            {{-- {{ dd($chunk) }} --}}
            @foreach ($chunk as $key=>$item)
            {{-- {{ dd($item) }} --}}
            <div class="col-6 col-md-3 mob-col pb-3">
                <div class="card meat-card">
                    <a href="/product_detail/{{ $item->id }}" class="img-zoom"><figure class="m-0"><img src="/uploads/{{ $item->product_img }}" class="card-img-top product_img" style="width: 100%;height: 180px;" alt="..."></figure></a> 
                    <div class="card-body" style="padding-top: 0.7rem;">
                        <p class="m-0 mb-font font-weight-bold" style="font-size: 17px;">{{ $item->product_name }}</p>
                        <p class="card-text d-fs m-0 pb-1 pt-2">{{ $item->type->type_name }} - {{$item->price }}ကျပ်</p>
                        
                        <h6 class="default-color d-fs">အရေအတွက်</h6>
                        <div class="wrap w-100 pt-1 d-fs">
                            <button type="button" id="sub" class="sub mob-sub text-center">-</button>
                        <input class="count pl-2 txt-qy mob-txt" id="count{{$item->id}}" type="text" value="1" min="1" max="1000" style="width:50%;" /> 
                            <button type="button" id="plus" class="plus mob-add text-center">+</button>
                        </div>
                    <a class="btn btn-xs btn-add animatebutton add text-white b-fs mt-3 float-right" style="cursor:pointer;" id="animatebutton{{ $item->id }}" data-id="{{ $item->id }}">စျေးခြင်းသို့ထည့်မည်</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </section>

    </div>
</section>
@endsection
@push('scripts')

<script>
    
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
            var count=$('#count'+id).val();
            
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

         // Bounce button
         $(".animatebutton").click(function(){
            var id=$(this).data("id");
            const element = document.querySelector('#animatebutton'+id);
            element.classList.add('animated', 'tada');
            setTimeout(function() {
                element.classList.remove('tada');
            }, 600);
        });
        
        
    });
    
   
    
</script>
@endpush