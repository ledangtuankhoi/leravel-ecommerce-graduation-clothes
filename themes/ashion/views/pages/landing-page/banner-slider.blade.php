@php
    $dataBanners = App\Http\Controllers\BlockPageController::BannerSlider();
    // dump($dataBanners);
@endphp

@if ($dataBanners)
    
    <section class="banner set-bg" data-setbg="{{ productImage($dataBanners['image']['image_background']) }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        {{-- <div class="banner__item">
                            <div class="banner__text">
                                <span>1</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>2</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>3</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>4</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>5</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>6</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div> --}}
                        @foreach ($dataBanners['captions'] as $item)                            
                        <div class="banner__item">
                            <div class="banner__text">
                                {{-- <span>7</span> --}}
                                <h1>{{ $item['title'] }}</h1>
                                <a href="{{ $item['link_shop'] }}">Shop now</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
