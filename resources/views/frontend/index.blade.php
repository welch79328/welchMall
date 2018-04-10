@extends('layouts.frontend.frontend')

@section('title', 'J-UGo 首頁')

@section('content')
    <!-- banner -->
    @include('layouts.frontend.banner')
    <!-- //banner -->
    <!-- limit -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info" style="color: red;">限時商品<i class="glyphicon glyphicon-time"></i></h3>
            <div style="position: relative">
                <button class="btn btn-default limit_previous_button hidden-xs" onclick="getLimitCommodities(this)"
                        value="{{$page["backPage"]}}" id="backPage">
                    <span class="glyphicon glyphicon-chevron-left limit_icon" aria-hidden="true"></span>
                </button>
                <button class="btn btn-default limit_next_button hidden-xs" onclick="getLimitCommodities(this)"
                        value="{{$page["nextPage"]}}" id="nextPage">
                    <span class="glyphicon glyphicon-chevron-right limit_icon" aria-hidden="true"></span>
                </button>
                <input value="{{$page["nowPage"]}}" type="hidden" id="nowPage">
                <div id="limitCommodityList">
                    @include('layouts.frontend.limitCommodityList')
                </div>
            </div>
        </div>
    </div>
    <!-- //limit -->
    <!-- /new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">全部商品</h3>
            <div id="horizontalTab">
                <div id="commodityList">
                    @include('layouts.frontend.commodityList')
                </div>
                <div class="clearfix"></div>
                <div style="padding-top: 40px;">
                    <button type="button" class="btn btn-default btn-lg center-block"
                            style="color: white; background-color: gray;" value="{{$page["nextPage"]}}"
                            onclick="getCommodities(this)" id="page">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        查看更多
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- //new_arrivals -->
    <!-- viewed products -->
    <div class="new_arrivals_agile_w3ls_info hidden-xs">
        <div class="container">
            <h3 class="wthree_text_info">瀏覽過的商品</h3>
            <div style="position: relative">
                {{--@if(!empty(session('recently_viewed.commodities')))--}}
                {{--<div class="btn btn-default viewed_previous_button hidden-xs">--}}
                {{--<span class="glyphicon glyphicon-chevron-left limit_icon" aria-hidden="true"></span>--}}
                {{--</div>--}}
                {{--<div class="btn btn-default viewed_next_button hidden-xs">--}}
                {{--<span class="glyphicon glyphicon-chevron-right limit_icon" aria-hidden="true"></span>--}}
                {{--</div>--}}
                {{--@endif--}}
                <div id="recentlyViewedCommodityList" style="min-height: 200px">
                    @include('layouts.frontend.recentlyViewedCommodityList')
                </div>
            </div>
        </div>
    </div>
    <!-- //viewed products -->
    <!-- /we-offer -->
    <!--<div class="sale-w3ls">
    <div class="container">
        <h6>We Offer Flat <span>40%</span> Discount</h6>

        <a class="hvr-outline-out button2" href="{{url('single')}}">Shop Now </a>
    </div>
</div>-->
    <!-- //we-offer -->
    <!--/grids-->
    <!--<div class="coupons">
        <div class="coupons-grids text-center">
            <div class="w3layouts_mail_grid">
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE SHIPPING</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>24/7 SUPPORT</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>MONEY BACK GUARANTEE</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE GIFT COUPONS</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>-->
    <!--grids-->
    <!-- login -->
    <!--<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modal-spa">
                    <div class="login-grids">
                        <div class="login">
                            <div class="login-bottom">
                                <h3>Sign up for free</h3>
                                <form>
                                    <div class="sign-up">
                                        <h4>Email :</h4>
                                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'Type here';
                                                }" required="">
                                    </div>
                                    <div class="sign-up">
                                        <h4>Password :</h4>
                                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'Password';
                                                }" required="">

                                    </div>
                                    <div class="sign-up">
                                        <h4>Re-type Password :</h4>
                                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'Password';
                                                }" required="">

                                    </div>
                                    <div class="sign-up">
                                        <input type="submit" value="REGISTER NOW" >
                                    </div>

                                </form>
                            </div>
                            <div class="login-right">
                                <h3>Sign in with your account</h3>
                                <form>
                                    <div class="sign-in">
                                        <h4>Email :</h4>
                                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'Type here';
                                                }" required="">
                                    </div>
                                    <div class="sign-in">
                                        <h4>Password :</h4>
                                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'Password';
                                                }" required="">
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="single-bottom">
                                        <input type="checkbox"  id="brand" value="">
                                        <label for="brand"><span></span>Remember Me.</label>
                                    </div>
                                    <div class="sign-in">
                                        <input type="submit" value="SIGNIN" >
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <!-- //login -->
    <a href="#home" class="scroll" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>

    <!-- //js -->
    <script src="{{asset('js/frontend/modernizr.custom.js')}}"></script>
    <!-- Custom-JavaScript-File-Links -->
    <!-- cart-js -->
    <script src="{{asset('js/frontend/minicart.min.js')}}"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });
        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }
    </script>
    <!-- //cart-js -->
    <!-- script for responsive tabs -->
    <script src="{{asset('js/frontend/easy-responsive-tabs.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });
        });</script>
    <!-- //script for responsive tabs -->
    <!-- stats -->
    <script src="{{asset('js/frontend/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/frontend/jquery.countup.js')}}"></script>
    <script> $('.counter').countUp();</script>
    <!-- //stats -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{asset('js/frontend/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frontend/jquery.easing.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });</script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({easingType: 'easeOutQuart'});
        });
    </script>
    <!-- //here ends scrolling icon -->

    <script>
        function addToShoppingCart(commodity_id) {
            $.get("{{url('shopping')}}/" + commodity_id, {}, function (data) {
                if (!data.result) {
                    showModal("errorModal", "提示", data.msg);
                    return;
                }
                $("#shoppingCartCount").html("(" + data.cartCount + ")購物車");
                showModal("successModal", "提示", data.msg);
                setTimeout(function () {
                    $("#successModal").modal("hide");
                }, 1000);
            });
        }

        function getLimitCommodities(obj) {
            var page = $(obj).val();
            if (page == 0) {
                showModal("errorModal", "提示", "目前已是第一頁");
                return;
            }
            $.post("{{url('get_limit_commodities')}}", {
                "page": page,
                "_token": "{{ csrf_token() }}",
            }, function (data) {
                if (data === "") {
                    showModal("errorModal", "提示", "目前已是最後一頁");
                    return;
                }
                $("#backPage").val(parseInt(page) - 1);
                $("#nowPage").val(parseInt(page));
                $("#nextPage").val(parseInt(page) + 1);
                $("#limitCommodityList").html(data);
                $.each(timer, function (index) {
                    clearInterval(timer[index]);
                });
                countdownTimer();
            });
        }

        function getCommodities(obj) {
            var page = $(obj).val();
            $.post("{{url('get_commodities')}}", {
                "page": page,
                "_token": "{{ csrf_token() }}",
            }, function (data) {
                if (data === "") {
                    showModal("errorModal", "提示", "目前已是最後一頁");
                    return;
                }
                $("#page").val(parseInt(page) + 1);
                $("#commodityList").append(data);
            });
        }
    </script>

@endsection
