<!-- Shop blade tuankhoi -->
@extends('layout')

@section('title', 'Products')

@section('extra-css')
<style>
    <style>.categories__accordion .card-heading a:after {
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
</style>
@endsection


<!-- Header Section Begin -->
@include('partials.header')
<!-- Header Section End -->

@section('content')

<!-- Categories Section Begin -->
@include('pages.landing-page.category')
<!-- Categories Section End -->

<!-- Product Section Begin -->
@include('pages.landing-page.new-product')
<!-- Product Section End -->

<!-- Banner Section Begin -->
@include('pages.landing-page.banner-slider')
<!-- Banner Section End -->

<!-- Trend Section Begin -->
@include('pages.landing-page.trend')
<!-- Trend Section End -->

{{-- //TODO: coupon for product --}}
{{--
discount for category product
shop
category product
group product
special product
--}}
<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="{{ asset('themes/ashion//img/discount.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

{{-- // TODO: instagram API shop get image --}}
<!-- Instagram Begin -->
@include('pages.landing-page.instagram')
<!-- Instagram End -->

<!-- Footer Section Begin -->
@include('partials.footer')
<!-- Footer Section End -->

<!-- Search Begin -->
@include('partials.search')
<!-- Search End -->

@endsection