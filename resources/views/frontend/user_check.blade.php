@extends('frontend.master')
@push('css')

@endpush
@section('content')

<img src="/images/banner3.png" alt="product" width="100%">
<div class="container pt-4">
    {{-- <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center"> <button type="button" id="animatebutton" class="btn animate btn-success btn-icon-text animatebutton"> <i class="fa fa-check btn-icon-prepend"></i> CLICK ME </button> </div>
        </div>
    </div> --}}
    <div class="row justify-content-center py-5 mob-lr">
        <div class="col-4">
            <div class="card copyright ">
                <a href="/user_login" class="btn">
                    <div class="card-body text-white text-center">
                        <p class="card-text">အကောင့်၀င်ရန်</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-5">
            {{-- <a href="" class="btn copyright"> --}}
                <div class="card copyright ">
                    <a href="/user_register" class="btn">
                        <div class="card-body text-white text-center">
                            <p class="card-text">အကောင့်မရှိပါက အကောင့်ဖန်တီးရန်</p>
                        </div>
                    </a>
                </div>
                {{-- </a> --}}
            </div>
        </div>

        <div class="row d-none mob-rl">
            <div class="col-12">
                <a href="/user_login" class="btn btn-add text-white py-2" style="width:100%">အကောင့်၀င်ရန်</a>
            </div>
            <div class="col-12">
                <a href="/user_register" class="btn btn-add text-white py-2 mt-3" style="width:100%">အကောင့်မရှိပါက အကောင့်ဖန်တီးရန်</a>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
   
    @endpush