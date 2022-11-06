<?php
$newProductByCategory = App\Http\Controllers\BlockPageController::NewProductByCategory(); ?>
@if ($newProductByCategory)


<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>

                    @foreach ($newProductByCategory as $item )
                    @php
                    $item = $item['category'];
                    @endphp
                    <li data-filter=".{{ $item['slug'] }}">{{ $item['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row property__gallery">

            @foreach ( $newProductByCategory as $item )

            @php
            $itemCate = $item['category'];
            $item = $item['product'];
            @endphp
            @if (count($item) >= 2)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $itemCate['slug'] }}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ productImage($item[0]['image']) }}">
                        <ul class="product__hover">
                            <li><a href="{{ productImage($item[0]['image']) }}" class="image-popup"><span
                                        class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <a href="{{ route('shop.index', ['c' => $item[0]['slug']]) }}">
                            <h6>
                                {{ $item[0]['name'] }}
                            </h6>
                            @if (array_key_exists('review_start', $item[0]))
                            $item[0]['review_start']
                            @else
                            {{-- <div class="rating">
                            </div> --}}
                            @endif
                            <div class="product__price">$ {{ presentPrice($item[0]['price']) }}</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $itemCate['slug'] }}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ productImage($item[1]['image']) }}">
                        <ul class="product__hover">
                            <li><a href="{{ productImage($item[1]['image']) }}" class="image-popup"><span
                                        class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <a href="{{ route('shop.index', ['c' => $item[1]['slug']]) }}">
                            <h6>
                                {{ $item[1]['name'] }}
                            </h6>
                            @if (array_key_exists('review_start', $item[1]))
                            $item[1]['review_start']
                            @else
                            {{-- <div class="rating">
                            </div> --}}
                            @endif
                            <div class="product__price">$ {{ presentPrice($item[1]['price']) }}</div>
                        </a>
                    </div>
                </div>
            </div>
            @else

            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $itemCate['slug'] }}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ productImage($item[0]['image']) }}">
                        <ul class="product__hover">
                            <li><a href="{{ productImage($item[0]['image']) }}" class="image-popup"><span
                                        class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <a href="{{ route('shop.index', ['c' => $item[0]['slug']]) }}">
                            <h6>
                                {{ $item[0]['name'] }}
                            </h6>
                            @if (array_key_exists('review_start', $item[0]))
                            $item[0]['review_start']
                            @else
                            {{-- <div class="rating">
                            </div> --}}
                            @endif
                            <div class="product__price">$ {{ presentPrice($item[0]['price']) }}</div>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @endforeach

        </div>
    </div>
</section>
@endif