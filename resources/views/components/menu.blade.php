<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ Route::currentRouteName() == 'home' ? 'active' : ''}}">
                <a href="{{ route('home') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Home</span>
                </a>
            </li>
			
			@if( $user->role == 'Admin' )
			<li class=" nav-item {{ Request::segment(2) == 'order' ? 'active' : ''}}">
                <a href="{{ route('admin.order.index') }}">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Đơn Hàng</span>
                </a>
            </li>

            <li class=" nav-item {{ Request::segment(2) == 'account' ? 'active' : ''}}">
                <a href="{{ route('admin.account.index') }}">
                    <i class="la me-lines"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Tài Khoản</span>
                </a>
            </li>

            <li class=" nav-item {{ Request::segment(2) == 'setting' ? 'active' : ''}}">
                <a href="{{ route('admin.setting.index') }}">
                    <i class="la ft-settings"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Setting</span>
                </a>
            </li>
			@endif
			
			@if( $user->role == 'User' )
				
			<li class=" nav-item {{ Request::segment(2) == 'product' ? 'active' : ''}}">
                <a href="{{ route('user.product.index') }}">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Sản Phẩm</span>
                </a>
            </li>
			
			{{--
			<li class=" nav-item {{ Request::segment(2) == 'campaign' ? 'active' : ''}}">
                <a href="{{ route('user.campaign.index') }}">
                    <i class="la la-check-circle"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Campaigns</span>
                </a>
            </li>
			--}}
			
			<li class=" nav-item {{ Request::segment(2) == 'order' ? 'active' : ''}}">
                <a href="{{ route('user.order.index') }}">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Đơn Hàng Của Bạn</span>
                </a>
            </li>
			
			<li class="nav-item {{ Request::segment(2) == 'payout' ? 'active' : ''}}">
				<a href="{{ route('user.payout.index') }}">
					<i class="la la-dollar"></i>
					<span class="menu-title" data-i18n="nav.dash.main">Rút Tiền</span>
				</a>
			</li>
			
			<li class=" nav-item {{ Request::segment(2) == 'setting' ? 'active' : ''}}">
                <a href="{{ route('user.setting.index') }}">
                    <i class="la ft-settings"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Setting</span>
                </a>
            </li>
			@endif
			
			@if( $user->role == 'Workshop' )
			<li class=" nav-item {{ Request::segment(2) == 'order' ? 'active' : ''}}">
                <a href="{{ route('workshop.order.index') }}">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Đơn Hàng</span>
                </a>
            </li>
			@endif
			
			

        </ul>
    </div>
</div>