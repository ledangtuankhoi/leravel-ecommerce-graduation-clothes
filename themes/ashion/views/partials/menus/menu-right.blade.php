@guest

    <div class="header__right__auth">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
@else
    <div class="header__right__auth">
        <a href="{{ route('users.edit') }}">My Account</a>
        <a href="{{ route('register') }}"
            onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">Logout</a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endguest

<ul class="header__right__widget">
    <li><span class="icon_search search-switch"></span></li>
    {{-- TODO: wish list cart--}}
    
    <li>
        <a href="#"><span class="icon_heart_alt"></span>
            <div class="tip">2</div>
        </a>
    </li>
    <li>
        <a href="{{ route('cart.index') }}"><span class="icon_bag_alt"></span>
            @if (Cart::instance('default')->count() > 0)
                <div class="tip">{{ Cart::instance('default')->count() }}</div>
            @endif
        </a>
    </li>
</ul>
