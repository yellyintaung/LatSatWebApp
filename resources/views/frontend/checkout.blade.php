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
            
            <?php
            $Date =date("d-m-Y");
            
            $dateObject = new DateTime('now', new DateTimeZone('Asia/Yangon'));
            $mydate =$dateObject->format('h:i A');
            $str_arr = explode (" ", $mydate);
            $mTime=$str_arr[0].'<br>';
            $AMPM=$str_arr[1];
            $str_arr1 = explode (":", $mTime);
            $mmTime=$str_arr1[0].'<br>';
            $minute=$str_arr1[1];
            
            if($AMPM=='PM' && $mmTime>=4 && $minute>00){
                $day1 = date('d-m-Y', strtotime($Date. ' + 2 days'));
                $day2 = date('d-m-Y', strtotime($Date. ' + 3 days'));
            }else{
                $day1 = date('d-m-Y', strtotime($Date. ' + 1 days'));
                $day2 = date('d-m-Y', strtotime($Date. ' + 2 days'));
            }
            ?>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                    <label for="inputPassword4">ရရှိနိုင်သောမြို့နယ်</label>
                    <select name="township" class="form-control" id="township" required>
                        <option value="ကျောက်တံတား">ကျောက်တံတား</option>
                        <option value="ပန်းပဲတန်း">ပန်းပဲတန်း</option>
                        <option value="လသာ">လသာ</option>
                        <option value="ဗိုလ်တစ်ထောင်">ဗိုလ်တစ်ထောင်</option>
                        <option value="လမ်းမတော်">လမ်းမတော်</option>
                        <option value="ပုဇွန်တောင်">ပုဇွန်တောင်</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress2">ပစ္စည်း ရယူလိုသောနေ့စွဲ</label>
                    <select name="want_date" class="form-control"  required>
                        <option value="<?php echo $day1 ?>"><?php echo $day1 ?></option>
                        <option value="<?php echo $day2 ?>"><?php echo $day2 ?></option>
                    </select>
                </div>
                <div class="form-group col-md-4">
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
            
            <div class="text-right">
                <button type="submit" class="btn btn-add text-white" onclick="return alert('Your Order is Successful!')">Place Order</button>
            </div>
        </form>
    </div>
</section>

@endsection
@push('scripts')

<script type="text/javascript">
    
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
    
</script>
@endpush