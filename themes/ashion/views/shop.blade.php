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
<span>Shop</span>
@endcomponent


<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">

                                @foreach ($categories as $category)

                                <div class="card">
                                    <div class="card-heading {{ setActiveCategory($category->slug) }}">
                                        <a href="{{ route('shop.index', ['c' => $category->slug]) }}">{{
                                            $category->name}}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    @forelse ($products as $product) 
                    <div class="col-lg-4 col-md-6"> 
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ productImage($product->image) }}" style="cursor: pointer;" onclick="window.location='{{ route('shop.show', $product->slug) }}';">
                                {{-- <div class="label new">New</div> --}}
                                <ul class="product__hover" style="z-index: 1">
                                    <li><a href="{{ productImage($product->image) }}" class="image-popup"><span
                                                class="arrow_expand"></span></a></li>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                </ul>
                            </div>
                            <a href="{{ route('shop.show', $product->slug) }}">
                                <div class="product__item__text">
                                    <h6><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h6>
                                    <div class="rating">
                                        {{-- <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> --}}
                                    </div>
                                    <div class="product__price">{{ $product->presentPrice() }}</div>
                                </div> 
                        </div>
                        </a>
                    </div>
                    @empty
                    <div style="text-align: left">No items found</div>
                    @endforelse

                </div>
                <div class="col-lg-12 text-center">
                    <div class="pagination__option">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Shop Section End -->


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
