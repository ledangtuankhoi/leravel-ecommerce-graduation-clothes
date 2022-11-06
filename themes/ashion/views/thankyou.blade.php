<!-- Shop blade tuankhoi -->
@extends('layout')

@section('title', 'Products')
 

<!-- Header Section Begin -->
@include('partials.header')
<!-- Header Section End -->

@section('content')

@component('components.breadcrumbs')
<a href="/"><i class="fa fa-home"></i> Home</a>
<span>Thank You</span>
@endcomponent
 

@section('content')

   <div class="thank-you-section">
       <h1>Thank you for <br> Your Order!</h1>
       <p>A confirmation email was sent</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Home Page</a>
       </div>
   </div>
   
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

 