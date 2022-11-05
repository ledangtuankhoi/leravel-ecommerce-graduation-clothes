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

    .site-btn {
        font-size: 14px;
        color: #ffffff;
        background: #ca1515;
        font-weight: 600;
        border: none;
        text-transform: uppercase;
        display: inline-block;
        padding: 0px 30px;
        border-radius: 10px 10px 50px 50px;
    }
    
</style>
@endsection

@section('content')

@component('components.breadcrumbs')
<a href="/"><i class="fa fa-home"></i> Home</a>
<span>Cart</span>
@endcomponent



<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">

        {{-- section MESSAGES --}}
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
        {{-- END section MESSAGES --}}

        {{-- cart-table --}}
        @if (Cart::count() > 0)
        <h2>{{ Cart::count() }} item(s) in Shopping Cart</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">

                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach (Cart::content() as $item)

                            <tr>
                                <td class="cart__product__item">
                                    <a href="{{ route('shop.show', $item->model->slug) }}">
                                        <img src="{{ productImage($item->model->image) }}" alt="item">
                                    </a>
                                    <div class="cart__product__item__title">
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <h6>{{$item->model->name }}</h6>
                                        </a>
                                        <div class="rating">
                                            {{-- <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">
                                    <div>{{ presentPrice($item->price) }}</div>
                                </td>
                                <td class="cart__quantity">
                                    {{-- <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div> --}}
                                    <select class="quantity" data-id="{{ $item->rowId }}"
                                        data-productQuantity="{{ $item->model->quantity }}">
                                        @for ($i = 1; $i < 5 + 1 ; $i++) <option {{ $item->qty == $i ? 'selected' : ''
                                            }}>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </td>
                                <td class="cart__total">
                                    <div>{{ presentPrice($item->subtotal) }}</div>
                                </td>
                                <td class="cart__close">
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="cart-options" title="Remove">
                                            <span class="icon_close"></span>
                                        </button>
                                    </form>
                                    <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="cart-options" title="Save for Later">
                                            <span class="icon_cloud-download_alt"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end cart-table -->

        {{-- Continue Shopping --}}
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="./shop">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="/cart"><span class="icon_loading"></span> Update cart</a>
                </div>
            </div>
        </div>
        {{--END Continue Shopping --}}


        <div class="row">
            <div class="col-lg-6">

                {{-- Coupon input --}}
                @if (!session()->has('coupon'))
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="{{ route('coupon.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="coupon_code" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
                @endif
                {{--END Coupon input --}}
            </div>

            {{-- Cart tatol --}}
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>
                            Subtotal
                            <span>
                                {{ presentPrice(Cart::subtotal()) }}
                            </span>
                        </li>
                        @if (session()->has('coupon'))
                        <hr>
                        <li>
                            <div class="row">
                                <div class="col-6">
                                    Code ({{ session()->get('coupon')['name'] }})
                                    <form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="site-btn" style="font-size:14px;">Remove</button>
                                    </form>

                                </div>
                                <div class="col-6">
                                    <span>

                                        -{{ presentPrice($discount) }}
                                    </span>

                                </div>
                            </div>
                            <hr>
                        <li>
                            New Subtotal
                            <span>&nbsp; {{ presentPrice($newSubtotal)}}</span>
                            @endif
                        </li>
                        </li>
                        <li>Tax({{config('cart.tax')}}%) <span>{{ presentPrice($newTax) }}</span></li>
                        <li>Total <span>{{ presentPrice($newTotal) }}</span></li>
                    </ul>
                    <a href="{{ route('checkout.index') }}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
            {{-- END Cart tatol --}}


            {{-- Saved for Later. --}} 
            @if (Cart::instance('saveForLater')->count() > 0)
            
            <div class="row" style="margin-top: 100px;">
                <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>
                <div class="col-lg-12">
                    <div class="shop__cart__table">

                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::instance('saveForLater')->content() as $item)

                                <tr>
                                    <td class="cart__product__item">
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ productImage($item->model->image) }}" alt="item">
                                        </a>
                                        <div class="cart__product__item__title">
                                            <a href="{{ route('shop.show', $item->model->slug) }}">
                                                <h6>{{$item->model->name }}</h6>
                                            </a>
                                            <div class="rating">
                                                {{-- <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">
                                        <div>{{ presentPrice($item->price) }}</div>
                                    </td>
                                    <td class="cart__quantity">
                                        {{-- <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div> --}}
                                        <select class="quantity" data-id="{{ $item->rowId }}"
                                            data-productQuantity="{{ $item->model->quantity }}">
                                            @for ($i = 1; $i < 5 + 1 ; $i++) <option {{ $item->qty == $i ? 'selected' :
                                                ''
                                                }}>{{ $i }}</option>
                                                @endfor
                                        </select>
                                    </td>
                                    <td class="cart__total">
                                        <div>{{ presentPrice($item->subtotal) }}</div>
                                    </td>
                                    <td class="cart__close">
                                        <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="cart-options" title="Remove">
                                                <span class="icon_close"></span>
                                            </button>
                                        </form>
                                        <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="cart-options" title="Move to Cart">
                                                <span class=" icon_cart_alt"></span>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @else

            <h3>You have no items Saved for Later.</h3>

            @endif
        </div>
        {{-- @endif --}}
        @else
        <h3>You have no items Saved for Later.</h3>
        @endif
    </div>
</section>
<!-- Shop Cart Section End -->


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

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
</script>

<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="{{ asset('js/algolia.js') }}"></script>
@endsection