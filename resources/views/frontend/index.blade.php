@extends('frontend.master')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/banner.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/banner.png" alt="Second slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

<section>
    <h3 class="default-color mb-header-font text-center py-5 font-weight-bold">ရောင်းအားအကောင်းဆုံးပစ္စည်းများ</h3>
    <section class="regular slider">
        @foreach ($product as $item)
        @if ($item->hot_item==1)
        <div class="card driver-card">
        <a href="/product_detail/{{ $item->id }}" class="img-zoom"><figure class="m-0"><img src="/uploads/{{ $item->product_img }}" class="card-img-top" style="width: 100%;height: 180px;" alt="..."></figure></a></a>
            <div class="card-body">
                <h6 class="card-title mb-font default-color h-fs font-weight-bold">{{ $item->category->category_name }}</h6>
                <p class="card-text d-fs">{{ $item->product_name }}</p>
                <p class="card-text"><small>၁{{ $item->type->type_name }} - {{ $item->price }}ကျပ်</small></p>
            </div>
        </div>
        @endif
        @endforeach
        
    </section>
</section>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $(".searchicon").click(function () {
            
            $(".search-box").toggle();
            
            $("input[type='text'].search").focus();
            
        });
      
    });
    
</script>
@endpush