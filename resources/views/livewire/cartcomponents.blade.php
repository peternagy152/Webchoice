
@if (Cart::count()===0)
<div>
    <div class="container">
        <h1> Your Shopping Cart is Empty </h1>
        <a href="{{route('shop')}}"> Return to Shop </a>

    </div>
</div>

    @else
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                    <li class="item-link"><span>Shopping Cart </span></li>
                </ul>
            </div>
            <div class=" main-content-area">

                <div class="wrap-iten-in-cart">
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @foreach ( Cart::content() as $item)
                        <?php
                        $image = DB::table('products')
                        ->where('id' , $item->id)
                        ->first();
                        ?>
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <img src="{{asset($image ->main_image)}}" alt="">
                            </div>
                            <div class="product-name">
                                <a class="link-to-product">{{$item->name}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">{{$item->price}}</p></div>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                    <a class="btn btn-increase" href="" wire:click.prevent="IncreaseQty('{{$item->rowId}}')"></a>
                                    <a class="btn btn-reduce" href="" wire:click.prevent ="DecreaseQty('{{$item->rowId}}')" ></a>
                                </div>
                            </div>
                            <div class="price-field sub-total"><p class="price">{{$item->subtotal}}</p></div>

                            <div class="delete">
                               <a href="{{route('cart.remove' ,['rowId' => $item->rowId])}}"> Delete </a>
                                </a>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                </div>

                <div class="summary" >
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{Cart::subtotal()}}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{Cart::total()}}</b></p>
                    </div>
                    <div class="checkout-info">
                        <label class="checkbox-field">
                            <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                        </label>
                        <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                        <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" href="{{route('cart.empty')}}">Clear Shopping Cart</a>
                        <a class="btn btn-update" href="#">Update Shopping Cart</a>
                    </div>
                </div>

            </div><!--end main content area-->
        </div><!--end container-->

    </main>

@endif
