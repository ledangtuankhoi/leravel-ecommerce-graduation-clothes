@guest

    <div class="header__right__auth">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
@else
    <div class="header__right__auth">
        <a href="{{ route('users.edit') }}">My Account</a>
        	          	<a href="#" data-toggle="modal" data-target="#logoutModal">logout</a>

    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endguest

<ul class="header__right__widget">
    <li><span class="icon_search search-switch"></span></li>
    {{-- TODO: wish list cart --}}

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


<!-- Small modal -->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4>Log Out <i class="fa fa-lock"></i></h4>
        </div>
        <div class="modal-body">
          <p><i class="fa fa-question-circle"></i> Are you sure you want to log-off? <br /></p>
          <div class="actionsBtns">
              <form action="/logout" method="post">
                  <input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}"/> 

                  <input onclick="event.preventDefault();document.getElementById('logout-form').submit();" type="submit" class="btn btn-default btn-primary" data-dismiss="modal" value="Logout" />
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

