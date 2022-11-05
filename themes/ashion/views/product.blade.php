<!-- Shop blade tuankhoi -->
@extends('layout')

@section('title', 'Products')



<!-- Header Section Begin -->
@include('partials.header')
<!-- Header Section End -->
@section('extra-css')
<style>
    .categories__accordion .card-heading a:after {
        content: none;
    }

    .categories__accordion .card-heading a {
        color: #818181;
    }

    .categories__accordion .card-heading.active a:after {
        content: none;
    }

    .categories__accordion .card-heading.active a {
        color: black;
        text-decoration: underline;
        text-decoration-color: red;
        text-decoration-thickness: 2px;
    }

    .product__item__pic.set-bg {
        background-position: center center;
        background-size: contain;
    }

    .product__item {
        margin-bottom: 35px;
        border-color: #dfdddd;
        border-style: solid;
        border-width: 2px;
        border-radius: 10px;
        box-shadow: 10px 10px lightblue;
    }

    .product__hover li a span {
        line-height: unset;
    }
</style>
@endsection

@section('content')

@component('components.breadcrumbs')
<a href="/"><i class="fa fa-home"></i> Home</a>
<a href="{{ route('shop.index') }}">Shop </a>
<span>{{ $product->name }}</span>
@endcomponent


<div class="container">
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">

                        @if ($product->images)
                        @foreach (json_decode($product->images, true) as $key => $image)
                        <a class="pt {{$key == 0 ? 'active' : ''}}" href="#product-{{$key+1}}">
                            <img src="{{ productImage($image) }}">
                        </a>
                        @endforeach
                        @endif

                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">

                            @if ($product->images)
                            @foreach (json_decode($product->images, true) as $key => $image)
                            <img data-hash="product-{{$key+1}}" class="product__big__img"
                                src="{{ productImage($image) }}" alt="">
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>
                        {{ $product->name }}
                        {{-- <span>Brand: SKMEIMore Men Watches from SKMEI</span> --}}
                    </h3>
                    <div class="rating">
                        {{-- <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> --}}
                        {{-- <span>( 138 reviews )</span> --}}
                    </div>
                    <div class="product__details__price">
                        {{ $product->presentPrice() }}
                        {{-- <span>$ 83.0</span> --}}
                    </div>
                    <p>{{ $product->details }}</p>
                    <div class="product__details__button">

                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        @if ($product->quantity > 0)
                        <form action="{{ route('cart.store', $product) }}" method="POST">
                            {{ csrf_field() }}
                            {{-- <button type="submit" class="button button">Add to Cart</button> --}}
                            <a href="#" onclick="this.parentNode.submit(); return false;" class="cart-btn"><span
                                    class="icon_bag_alt"></span> Add to cart</a>
                        </form>
                        @endif
                        <ul>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    <label for="stockin">
                                        In Stock
                                        
                                        <input type="checkbox" id="stockin" {{$stockLevel? 'checked' : ''}}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                {{-- <span>Available color:</span>
                                <div class="color__checkbox">
                                    <label for="red">
                                        <input type="radio" name="color__radio" id="red" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="black">
                                        <input type="radio" name="color__radio" id="black">
                                        <span class="checkmark black-bg"></span>
                                    </label>
                                    <label for="grey">
                                        <input type="radio" name="color__radio" id="grey">
                                        <span class="checkmark grey-bg"></span>
                                    </label>
                                </div> --}}
                            </li>
                            <li>
                                {{-- <span>Available size:</span>
                                <div class="size__btn">
                                    <label for="xs-btn" class="active">
                                        <input type="radio" id="xs-btn">
                                        xs
                                    </label>
                                    <label for="s-btn">
                                        <input type="radio" id="s-btn">
                                        s
                                    </label>
                                    <label for="m-btn">
                                        <input type="radio" id="m-btn">
                                        m
                                    </label>
                                    <label for="l-btn">
                                        <input type="radio" id="l-btn">
                                        l
                                    </label>
                                </div> --}}
                            </li>
                            <li>
                                {{-- <span>Promotions:</span>
                                <p>Free shipping</p> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>

                            {!! $product->description !!}
                        </div>
                        {{-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Specification</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div> --}}
                        {{-- <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Reviews ( 2 )</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.might-like')

    </div>
</section>
<!-- Product Details Section End -->

{{-- // TODO: instagram API shop get image --}}
<!-- Instagram Begin -->
{{-- @include('pages.landing-page.instagram') --}}
<!-- Instagram End -->

<!-- Footer Section Begin -->
@include('partials.footer')
<!-- Footer Section End -->

<!-- Search Begin -->
@include('partials.search')
<!-- Search End -->
@endsection