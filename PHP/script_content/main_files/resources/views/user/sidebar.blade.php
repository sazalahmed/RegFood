<ul>
    <li><a class="{{ Route::is('dashboard') || Route::is('edit-profile') ? 'active' : '' }}" href="{{ route('dashboard') }}"><span><i class="fas fa-user"></i></span>
            {{__('My Profile')}}</a></li>
    <li><a class="{{ Route::is('address.*') ? 'active' : '' }}" href="{{ route('address.index') }}"><span><i class="fas fa-user"></i></span>{{__('Address')}}</a>
    </li>
    <li><a class="{{ Route::is('orders') || Route::is('single-order') ? 'active' : '' }}" href="{{ route('orders') }}"><span><i class="fas fa-bags-shopping"></i></span>
            {{__('Orders')}}</a></li>
    <li><a class="{{ Route::is('wishlists') ? 'active' : '' }}" href="{{ route('wishlists') }}"><span><i class="far fa-heart"></i></span>
            {{__('Wishlist')}}</a></li>

      <li><a class="{{ Route::is('reservation') ? 'active' : '' }}" href="{{ route('reservation') }}"><span><i class="far fa-heart"></i></span>
            {{__('Reservation')}}</a></li>

    <li><a class="{{ Route::is('review-list') ? 'active' : '' }}" href="{{ route('review-list') }}"><span><i class="fas fa-star"></i></span> {{__('Reviews')}}</a>
    </li>
    <li><a class="{{ Route::is('change-password') ? 'active' : '' }}" href="{{ route('change-password') }}"><span><i
                    class="fas fa-user-lock"></i></span> {{__('Change Password')}}</a></li>
    <li><a href="#"><span> <i class="fas fa-sign-out-alt"></i></span> Logout</a></li>
</ul>
