@extends('layouts.layout')
@section('content')
@if (count($items) === 0)
<div class="container">
    <h3>No Item Found With Such A keyword </h3>
    <span>Try Diffrent Keyword</span>
</div>
@else
<!--main area-->
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span> Search Result</span></li>
            </ul>
        </div>
                <div class="wrap-shop-control">

                    <h1 class="shop-title">Search Result  For : {{$keyword}} </h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen"  wire:model = 'sorting'>
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="pricehigh">Sort by price: high to low </option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" >
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach ( $items as $item )
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details' , ['product_details' => $item->id ])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset($item ->main_image)}}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a  class="product-name"><span> {{ $item -> name }}</span></a>
                                    <a  class="product-name"><span>  Brand : {{ $item ->brand_name  }}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$item -> price}}</span></div>
                                    <a href="#" class="btn add-to-cart">Add To Cart</a>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>



                <div class="wrap-pagination-info">
                    {{-- }}
                    <ul class="page-numbers">
                        <li><span class="page-number-item current" >1</span></li>
                        <li><a class="page-number-item" href="#" >2</a></li>
                        <li><a class="page-number-item" href="#" >3</a></li>
                        <li><a class="page-number-item next-link" href="#" >Next</a></li>
                    </ul>
                    <p class="result-count">Showing 1-8 of 12 result</p>
                    --}}
                </div>

            </div><!--end main products area-->



        </div><!--end row-->

    </div><!--end container-->

</main>
<!--main area-->
@endif

@endsection
