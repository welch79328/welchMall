<style>
    .onlineDiv {
        text-align: center;
        font-size: 20px;
        color: #d8a91e;
        font-weight: bold;
    }

    .commodity_subtitle {
        padding-left: 5px;
        padding-right: 5px;
        text-align: center;
        font-size: 12px;
        height: 15px;
        color: #e71d1c;
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .commodity_title {
        word-break: break-all;
        height: 55px;
        text-align: left;
        padding-left: 5px;
        padding-right: 5px;
        margin-top: 0;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .remainTime {
        background-color: gray;
        text-align: center;
        font-weight: bold;
    }

    @media (max-width: 480px) {

        .onlineDiv {
            font-size: 16px;
        }

        .remainTime {
            font-size: 12px;
            background-color: gray;
            text-align: center;
            font-weight: bold;
        }

        .commodity_title {
            height: 75px;
        }
    }

</style>
@forelse($limitCommodities as $limit)
    <div class="col-xs-6 col-sm-3 col-md-3 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
            <div class="remainTime" style="">
                剩餘時間
                <input name="endTime[]" type="hidden" value="{{$limit->commodity_end_time}}">
                <span></span>
            </div>
            <div class="men-thumb-item">
                <img src="{{url(''.$limit->commodity_image)}}" alt="{{$limit->commodity_title}}" class="pro-image-front"
                     onError="this.src='{{$errorImgUrl}}'">
                <img src="{{url(''.$limit->commodity_image)}}" alt="{{$limit->commodity_title}}" class="pro-image-back"
                     onError="this.src='{{$errorImgUrl}}'">
                <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                        <a href="{{url('commodity/'. $limit->commodity_id.'?rand='.$limit->rand)}}"
                           class="link-product-add-cart">查看商品</a>
                    </div>
                </div>
                <span class="product-new-top">限量</span>

            </div>
            <div class="item-info-product">
                <p class="commodity_subtitle">{{$limit->commodity_subtitle}}</p>
                <h4 class="commodity_title">
                    <a href="{{url('commodity/'. $limit->commodity_id)}}">{{$limit->commodity_title}}</a>
                </h4>
                <div class="info-product-price">
                    {{--<div>--}}
                    {{--<del>售價$69.71</del>--}}
                    {{--</div>--}}
                    <div class="item_price">
                        預購價 <span>${{$limit->commodity_price}}</span>
                    </div>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                    <input type="button" value="立即預購" class="button"
                           onclick="showChooseSpecDialog({{$limit->commodity_id}});"/>
                </div>
                </a>
            </div>
            <div style="text-align: center;">剩餘組數 {{$limit->commodity_stock}}</div>
            <div class="onlineDiv">目前{{$limit->online}}人正在瀏覽</div>
        </div>
    </div>
@empty
    <div style="margin-top: 20px; text-align: center;">查無商品！</div>
@endforelse
<script>
    var timer = [];
    $(document).ready(function () {
        countdownTimer();
    });

    function countdownTimer() {
        var spans = $("input[name='endTime[]']");
        spans.each(function (index) {
            var endTime = $(this).val();
            var countDownDate = new Date(endTime.replace(/-/g, '/')).getTime();
            countdown(countDownDate, $(this), index);
        })
    }

    function countdown(countDownDate, obj, index) {
        timer[index] = setInterval(function () {
            // Get todays date and time
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            var remainTime = days + "天 " + hours + ":" + minutes + ":" + seconds;
            $(obj).next().show();
            $(obj).next().html(remainTime);
            // If the count down is over, write some text
            if (distance <= 0) {
                clearInterval(timer[index]);
                getLimitCommodities($("#nowPage"));
            }
        }, 1000);
    }

    function showChooseSpecDialog(commodity_id) {
        $.get("{{url('show_choose_spec_dialog')}}/" + commodity_id, {},
            function (data) {
                if (data === "") {
                    addToShoppingCart(commodity_id);
                    return;
                }
                $("#specModalPlace").html(data);
                $("#specModal").modal("show");
            });
    }

    function addToShoppingCart(commodity_id) {
        $.get("{{url('shopping')}}/" + commodity_id, {},
            function (data) {
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

</script>