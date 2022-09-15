<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
        <li>
            <a href="{{ route('cart.index') }}"><span class="icon_bag_alt"></span>
                @if (Cart::instance('default')->count() > 0)
                    <div class="tip">{{ Cart::instance('default')->count() }}</div>
                @endif
            </a>
        </li>
    </ul>
    <div class="offcanvas__logo">
        <a href="./index.html"><img src="{{ asset('themes/ashion//img/logo.png') }}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        @guest

            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @else
            <a href="{{ route('users.edit') }}">My Account</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                @include('partials.logo')
            </div>
            <div class="col-xl-6 col-lg-7">
                @include('partials.menus.menu-center', [
                    'categories' => $categories,
                ])

            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    @include('partials.menus.menu-right')
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<!-- Header Section End -->
