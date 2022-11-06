@php
$trend = App\Http\Controllers\BlockPageController::TrendBlock();
@endphp

<section class="trend spad">
    <div class="container">
        <div class="row">
            @foreach ($trend as $key => $a)
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
                    @foreach ($trend[$key] as $item)
                    <a href="{{ route('shop.index', ['c' => $item['slug']]) }}">

                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="{{ productImage($item['image']) }}" alt="{{ $item['name'] }}">
                            </div>
                            <div class="trend__item__text">
                                <h6>{{ $item['name'] }}</h6>
                                @if (array_key_exists('review_start', $item))
                                $item['review_start']]
                                @else
                                <div class="rating">
                                    {{-- <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> --}}
                                </div>
                                @endif
                                <div class="product__price">{{ presentPrice($item['price']) }}</div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>