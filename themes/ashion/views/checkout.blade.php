<!-- Shop blade tuankhoi -->
@extends('layout')

@section('title', 'Products')

@section('extra-css')
<style>
    .StripeElement {
        background-color: white;
        padding: 16px 16px;
        border: 1px solid #ccc;
    }

    .checkout__form h5 {
        text-decoration: underline;
        text-decoration-color: red;
        text-decoration-thickness: 2px;
    }
</style>
<script src="https://js.stripe.com/v3/"></script>
@endsection

<!-- Header Section Begin -->
@include('partials.header')
<!-- Header Section End -->

@section('content')

@component('components.breadcrumbs')
<a href="/"><i class="fa fa-home"></i> Home</a>
<span>Cart</span>
@endcomponent

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        @if (!session()->has('coupon'))
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="{{route('cart.index')}}">Have a coupon?</a> Click
                    here to enter your code.</h6>
            </div>
        </div>
        @endif
        <form action="{{ route('checkout.store') }}" method="POST" id="payment-form" class="checkout__form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Name <span>*</span></p>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <input type="text" placeholder="Street Address" class="form-control" id="address"
                                    name="address" value="{{ old('address') }}" required>

                            </div>
                            <div class="checkout__form__input">
                                <p>City <span>*</span></p>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}"
                                    required>
                            </div>
                            <div class="checkout__form__input">
                                <p>Province <span>*</span></p>
                                <input type="text" class="form-control" id="province" name="province"
                                    value="{{ old('province') }}" required>
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" class="form-control" id="postalcode" name="postalcode"
                                    value="{{ old('postalcode') }}" required>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Phone <span>*</span></p>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">

                                <p>Email <span>*</span></p>
                                @if (auth()->user())
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ auth()->user()->email }}" readonly>
                                @else
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            {{-- <div class="checkout__form__checkbox">
                                <label for="acc">
                                    Create an acount?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create am acount by entering the information below. If you are a returing
                                    customer login at the <br />top of the page</p>
                            </div>
                            <div class="checkout__form__input">
                                <p>Account Password <span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__form__checkbox">
                                <label for="note">
                                    Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="note">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <div class="checkout__form__input">
                                <p>Oder notes <span>*</span></p>
                                <input type="text" placeholder="Note about your order, e.g, special noe for delivery">
                            </div>
                        </div>
                    </div>

                    <h5 style="margin-top: 50px">Payment detail</h5>
                    <div class="checkout__form__input">
                        <p>Name on Card <span>*</span></p>
                        <input type="text" id="name_on_card" name="name_on_card" value="">
                    </div>

                    <div class="checkout__form__input">
                        <p> Credit or debit card <span>*</span></p>
                        <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                </div>




                {{-- Your Order --}}
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Product</span>
                                    <span class="top__text__right">Total</span>
                                </li>
                                <span hidden>
                                    {{$index = 1}}
                                </span>
                                @foreach (Cart::content() as $key => $item)
                                <li>{{$index++}}. {{$item->model->name }} <span>{{ $item->model->presentPrice()
                                        }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>

                                <li>
                                    Subtotal
                                    <span>
                                        {{ presentPrice(Cart::subtotal()) }}
                                    </span>
                                </li>
                                @if (session()->has('coupon'))
                                <li>
                                    <div class="row">
                                        <div class="col-6">
                                            Code ({{ session()->get('coupon')['name'] }})

                                        </div>
                                        <div class="col-6">
                                            <span>

                                                -{{ presentPrice($discount) }}
                                            </span>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    New Subtotal
                                    <span>&nbsp; {{ presentPrice($newSubtotal)}}</span>
                                </li>
                                <hr>
                                @endif
                                <li>Tax({{config('cart.tax')}}%) <span>{{ presentPrice($newTax) }}</span></li>
                                <li>Total <span>{{ presentPrice($newTotal) }}</span></li>
                            </ul>
                        </div>
                        {{-- <div class="checkout__order__widget">
                            <label for="o-acc">
                                Create an acount?
                                <input type="checkbox" id="o-acc">
                                <span class="checkmark"></span>
                            </label>
                            <p>Create am acount by entering the information below. If you are a returing customer
                                login at the top of the page.</p>
                            <label for="check-payment">
                                Cheque payment
                                <input type="checkbox" id="check-payment">
                                <span class="checkmark"></span>
                            </label>
                            <label for="paypal">
                                PayPal
                                <input type="checkbox" id="paypal">
                                <span class="checkmark"></span>
                            </label>
                        </div> --}}
                        <button type="submit" id="complete-order"  class="site-btn">Place oder</button>

                    </div>
                </div>
                {{--END Your Order --}}

            </div>
        </form>
        @if ($paypalToken)
        <div class="mt-32">or</div>
        <div class="mt-32">
            <h2>Pay with PayPal</h2>

            <form method="post" id="paypal-payment-form" action="{{ route('checkout.paypal') }}">
                @csrf
                <section>
                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button-primary" type="submit"><span>Pay with PayPal</span></button>
            </form>
        </div>
        @endif
    </div>
</section>
<!-- Checkout Section End -->



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
<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

<script>
    (function(){
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;

              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }

              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;

                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });

            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
            }

            // PayPal Stuff
            var form = document.querySelector('#paypal-payment-form');
            var client_token = "{{ $paypalToken }}";
            console.info('asdf',client_token);


            braintree.dropin.create({
              authorization: client_token,
              selector: '#bt-dropin',
              paypal: {
                flow: 'vault'
              }
            }, function (createErr, instance) {
              if (createErr) {
                console.log('Create Error', createErr);
                return;
              }

              // remove credit card option
              var elem = document.querySelector('.braintree-option__card');
              elem.parentNode.removeChild(elem);

              form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                  if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                  }

                  // Add the nonce to the form and submit
                  document.querySelector('#nonce').value = payload.nonce;
                  form.submit();
                });
              });
            });

        })();
</script>
@endsection