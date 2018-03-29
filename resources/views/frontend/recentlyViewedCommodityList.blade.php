@forelse($recentlyViewedCommodities as $viewed)
<div class="col-md-3 product-men">
    <div class="men-pro-item simpleCart_shelfItem">
        <div class="men-thumb-item">
            <img src="{{url('' . $viewed->commodity_image)}}" alt="" class="pro-image-front" onError="this.src='{{$errorImgUrl}}'">
            <img src="{{url('' . $viewed->commodity_image)}}" alt="" class="pro-image-back" onError="this.src='{{$errorImgUrl}}'">
            <div class="men-cart-pro">
                <div class="inner-men-cart-pro">
                    <a href="{{url('commodity/' . $viewed->commodity_id)}}" class="link-product-add-cart">查看商品</a>
                </div>
            </div>
        </div>  
    </div>
</div>
@empty
<div>無商品！</div>
@endforelse