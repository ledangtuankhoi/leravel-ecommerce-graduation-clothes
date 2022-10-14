@php
$trend = App\Http\Controllers\BlockPageController::TrendBlock();
@endphp

<section class="trend spad">
    <div class="container">
        <div class="row">
            @foreach ($trend as $key => $item)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        @if ($key == 'hot_trend')
                        <h4>Hot Trend</h4>
                        @elseif ($key == 'best_saller')
                        <h4>Best Seller</h4>
                        @else
                        <h4>Feature</h4>
                        @endif
                    </div>
                    <div class="trend__item">
                        <a href="{{ route('shop.index', ['c' => $item[0]['slug']]) }}" title="{{ $item[0]['name'] }}">
                            <div class="trend__item__pic">
                                <img src="{{ productImage($item[0]['image']) }}"  
                                    style="height:90px;">
                            </div>
                            <div class="trend__item__text">
                                <h6 alt="{{ $item[0]['name'] }}">{{ $item[0]['name'] }}</h6>
                                @if (array_key_exists('review_start', $item[0]))
                                $item[0]['review_start']
                                @else
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                @endif
                                <div class="product__price"> {{ presentPrice($item[0]['price']) }}</div>
                            </div>
                        </a>
                    </div>
                    <div class="trend__item">
                        <a href="">
                            <div class="trend__item__pic">
                                <img src="{{ productImage($item[1]['image']) }}" alt="{{ $item[0]['name'] }}"
                                    style="height:90px;">
                            </div>
                            <div class="trend__item__text">
                                <h6 alt="{{ $item[0]['name'] }}">{{ $item[1]['name'] }}</h6>
                                @if (array_key_exists('review_start', $item[1]))
                                $item[1]['review_start']
                                @else
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                @endif
                                <div class="product__price"> {{ presentPrice($item[1]['price']) }}</div>
                            </div>
                        </a>
                    </div>
                    <div class="trend__item">
                        <a href="">
                            <div class="trend__item__pic">
                                <img src="{{ productImage($item[2]['image']) }}" alt="{{ $item[0]['name'] }}"
                                    style="height:90px;">
                            </div>
                            <div class="trend__item__text">
                                <h6 alt="{{ $item[0]['name'] }}">{{ $item[2]['name'] }}</h6>
                                @if (array_key_exists('review_start', $item[2]))
                                $item[2]['review_start']
                                @else
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                @endif
                                <div class="product__price"> {{ presentPrice($item[0]['price']) }}</div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>