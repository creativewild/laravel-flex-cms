<!--<button type="button" class="btn btn-primary" data-effect="st-effect-1"><span class="glyphicon glyphicon-arrow-down"></span>Login</button>-->
@if (Session::has('cart'))
<a href="{{URL::to('/cart')}}" class="btn btn-primary" ></span>You Have {{count(Session::get('cart'))}} Item(s) In Your Cart</a>
@endif
@if (Auth::check())
<a href="{{URL::to('/user/logout')}}" class="btn btn-primary" ><span class="glyphicon glyphicon-arrow-down"></span>Logout</a>
@else
<a href="{{URL::to('/user/login')}}" class="btn btn-primary" ><span class="glyphicon glyphicon-arrow-down"></span>Login</a>
@endif

