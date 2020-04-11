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
        <p class="text-danger">*မြို့နယ်အလိုက် ပို့ဆောင်ခအပြောင်းအလဲရှိပါသည်။</p>
      
                <form action="/placeOrder" method="post" style="border: 1px solid #32B34A;" class="p-3">
                    {{ csrf_field() }}
                    
                    <?php
                    //$Date =date("d-m-Y");
                    $diffWithGMT=6*60*60+30*60; //converting time difference to seconds.
                    $dateFormat="d-m-Y";
                    $Date=gmdate($dateFormat, time()+$diffWithGMT);//time() function returns the current time measured in the number of seconds since the Unix Epoch. 
                    //echo 'current date is '.$Date.'<br>';
                    
                    $dateObject = new DateTime('now', new DateTimeZone('Asia/Yangon'));
                    $mydate =$dateObject->format('h:i A');
                    $str_arr = explode (" ", $mydate);
                    $mTime=$str_arr[0].'<br>';
                    $AMPM=$str_arr[1];
                    $str_arr1 = explode (":", $mTime);
                    
                    $mmTime=$str_arr1[0].'<br>';
                    $minute=$str_arr1[1];
                    if($mmTime==12 && $AMPM=='PM'){
                        $mmTime = 0;
                    }
                    //ssssss
                    
                    if($AMPM=='PM' && $mmTime>=4 && $minute>00){
                        $day1 = date('d-m-Y', strtotime($Date. ' + 2 days'));
                        $day2 = date('d-m-Y', strtotime($Date. ' + 3 days'));
                    }else{
                        $day1 = date('d-m-Y', strtotime($Date. ' + 1 days'));
                        $day2 = date('d-m-Y', strtotime($Date. ' + 2 days'));
                    }
                    ?>
                    
                    
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">ရရှိနိုင်သောမြို့နယ်</label>
                            <select name="township_id" class="form-control"id="township_id" required>
                                <option value="0">မြို့နယ်ရွေးပါ</option>
                                @foreach ($townships as $township)
                                <option value="{{ $township->id }}">{{ $township->township_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ပို့ဆောင်ခ</label>
                            <select name="township_id" class="form-control child_id" disabled>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">ပစ္စည်း ရယူလိုသောနေ့စွဲ</label>
                            <select name="want_date" class="form-control"  required>
                                <option value="<?php echo $day1 ?>"><?php echo $day1 ?></option>
                                <option value="<?php echo $day2 ?>"><?php echo $day2 ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">ပစ္စည်း ရယူလိုသောအချိန်</label>
                            <select name="time" class="form-control"  required>
                                <option value="မနက် ၉နာရီ">မနက် ၉နာရီ</option>
                                <option value="မနက် ၁၀နာရီ">မနက် ၁၀နာရီ</option>
                                <option value="မနက် ၁၁နာရီ">မနက် ၁၁နာရီ</option>
                                <option value="နေ့လည် ၁၂နာရီ">နေ့လည် ၁၂နာရီ</option>
                                <option value="ညနေ ၃နာရီ">ညနေ ၃နာရီ</option>
                                <option value="ညနေ ၄နာရီ">ညနေ ၄နာရီ</option>
                                <option value="ညနေ ၅နာရီ">ညနေ ၅နာရီ</option>
                                <option value="ညနေ ၆နာရီ">ညနေ ၆နာရီ</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="inputAddress2">လိပ်စာ</label>
                        <textarea class="form-control" name="address" cols="30" rows="3" placeholder="အိမ်နံပါတ်၊လမ်း၊ရပ်ကွက်" required></textarea> 
                    </div>

                    <label for="inputAddress2">အမှာစာရင်း</label>
                    <div class="card" style="border-color:#ced4da;">
                        <div class="ml-4 mr-4 mb-3 text-main-color">
                            <ul class="list-inline" style="margin-bottom: 0px;padding-top:13px;">
                                <li class="list-inline-item"><h6>ကျသင့်ငွေ</h6></li>
                                <li class="list-inline-item float-right">{{ $total }} ကျပ်</li>
                            </ul>
                            <ul class="list-inline" style="margin-bottom: 0px;">
                                <li class="list-inline-item"><h6>ပို့ဆောင်ခ</h6></li>
                                <li class="list-inline-item float-right child_id"></li>
                            </ul>
                            <hr style="width:100%;background-color:#707070;float:right">
                            <ul class="list-inline" style="padding-top:33px;">
                                <li class="list-inline-item"><h6>စုစုပေါင်းကျသင့်ငွေ</h6></li>
                                <li class="list-inline-item float-right text-default-color totalPrice">{{ $total }} ကျပ်</li>                            
                            </ul>
                            {{-- <hr style="background-color:#707070;"> --}}
                            </div>
                        </div>

                        <select name="total_price" class="form-control totalPrice" hidden>
                        <option value="{{ $total }}">{{ $total }} ကျပ်</option>

                        </select>
                    
                    <div class="text-right pt-3">
                        <button type="submit" class="btn btn-add text-white" onclick="return alert('Your Order is Successful!')">အော်ဒါတင်မည်</button>
                    </div>
                </form>
        </div>
    </section>
    
    @endsection
    @push('scripts')
    
    <script type="text/javascript">
        
        $(document).ready(function(){ 
            $('#township_id').on('change', function(){
                $('.child_id').empty();
                var id = $(this).val();
                // var total = $(this).val();
                if(id){
                    $.ajax({
                        type: 'get',
                        url: '/get_delivery/'+id,
                        success: function(data){ 
                            console.log(data);
                           
                            $.each(data.townships, function(index,value) {
                                $('.child_id').append('<option value='+value.id+'>'+value.delivery_cost+' ကျပ်'+'</option>');

                                var total = data.total+value.delivery_cost;
                                $('.totalPrice').html('<option value='+total+'>'+total+' ကျပ်'+'</option>');
                                // $('.totalPrice').html(data.total+value.delivery_cost+'ကျပ်');
                                // $('.totalPrice').html('<input type="text" name="total_price" value='+data.total+value.delivery_cost+'>');
                            });
                            
                        }
                    })
                }
                
            });
            
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
        });
    </script>
    @endpush