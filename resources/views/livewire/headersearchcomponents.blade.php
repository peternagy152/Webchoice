<?php
$keyword = ' ';
?>
    <div class="wrap-search center-section">
        <div class="wrap-search-form">
            <form action="/search" id="form-search-top" name="form-search-top" method="Get">
                @csrf
                <input type="text" name="search" value="" placeholder="Search here...">
                <button type = "submit" form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                <div class="wrap-list-cate">
                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                    <a href="#" class="link-control">All Category</a>
                    <ul class="list-cate">
                        <li class="level-0">All Category</li>
                        @foreach ($cat as $onecat )
                        <li class = "level-0"> {{$onecat->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </form>
        </div>
    </div>
