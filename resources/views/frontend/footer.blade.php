<footer>
    <div class="footer p-5 mt-4">
        <div class="container">
            <div class="row adjust"><div class="col-md-4 col-sm-3">
            <a href="/" class="lasat-about"><img src="/images/logo.png" alt="logo" width="45px" />
                    <span class="logotext pl-2">ဝန်ဆောင်မှုပေးနေသော မြို့နယ်များ</span></a> 
                    <p class="pt-2 fan text-justy" style="line-height: 2;">
                      ဗဟန်း၊ တာမွေ၊ လသာ၊ ပန်းဆိုးတန်း၊ အလုံ၊ မြေနီကုန်း၊ ကြည်မြင့်တိုင် အစရှိသည့်မြို့နယ်များတွင် ပစ္စည်းရောက်‌ငွေရှင်း စနစ်ဖြင့်မှာယူနိုင်ပါပြီ။
                   </p>
                </div>
                <div class="col-md-4 col-sm-2 pt-3">
                    <div class="mob-qlink" style="padding-left: 6rem;">
                    <h5 class="logotext">Quick Link</h5>
                    <ul class="list-unstyled" style="line-height: 2.4;">
                      @foreach ($menu_categories as $categories)
                      <li><a href="/product/{{ $categories->id }}" class="linkmenu">{{ $categories->category_name }}</a></li>
                      @endforeach
                    </ul>
                </div>
                </div>
                
            
                <div class="col-md-4 col-sm-3">
                    <h5 class="logotext pt-3 pb-2">Facebook</h5>                    

                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fweb.facebook.com%2Flatsatfood&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"  width="100%" height="320" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                
            </div>
            
        </div>
        
    </div>
    <div class="copyright">
    <p class="text-center text-white p-2 mb-0">Copyright © 2020 Latsat Food. All rights reserved</p>
   </div>
</footer>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  {{-- --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="{{ '/js/all.js' }}"></script>
<script src="{{ '/js/slick.js' }}"></script>

@stack('scripts')
<script>
    $(".regular").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
                    {
                      breakpoint: 1200,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 1008,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 800,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 500,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
                    }

                  ]
    });

    function showCart() {
        $.ajax({
            type:'get',
            url:'/showShoppingCartCount',
            success:function(data){
                if(data.count>=1 )
                {
                    $('.lbcount').show();
                    $('#show-count').html(data.count);
                }
                else{
                    $('.lbcount').hide();
                }
               
            }
        });
    }
    showCart();

</script>

</body>
</html>