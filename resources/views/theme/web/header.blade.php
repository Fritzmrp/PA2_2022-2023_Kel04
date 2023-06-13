<header id="home">
	<div class="top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<ul class="list-inline pull-left icon">
						<li><a href="mailto:cafeupsize@gmail.com"><i class="icofont icofont-ui-message"></i> Gmail : info@cafeupsize@gmail.com</a></li>
						<li><a href="https://wa.me/6282277592764"><i class="icofont icofont-phone"></i> Phone Number : 0822 7759 2764</a></li>
						@auth
						<li><a href="{{ route('web.cart.index') }}"><i class="icofont icofont-cart-alt"></i>Cart</a></li>
						@endauth
					</ul>			
					<ul class="list-inline pull-right  icon">
						@auth
						<li>
							<form method="post" enctype="multipart/form-data" id="form-language">
								<div class="btn-group">
									<button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
										<i class="icofont icofont-notification"></i>Notification<span class="name"></span>
									</button>
									<ul class="dropdown-menu" style="padding:10px 10px 10px 0px;">
										<li><a href="#"><b>Order</b></a></li>
										@if ($notif)
											@foreach ($notif as $item)
												<li><a href="javascript:;">{!! $item->pemberitahuan !!}</a></li>
											@endforeach
										@endif
										@if (!$notif)
											<li><a href="#"><b>No Notification</b></a></li>
										@endif
										<hr style="margin:10px;">
										<li><a href="#"><b>Booking</b></a></li>
										@if ($notifBooking)
											@foreach ($notifBooking as $item)
												<li><a href="javascript:;">{!! $item->pemberitahuan !!}</a></li>
											@endforeach	
										@endif
										@if (!$notifBooking)
										    <li><a href="#"><b>No Notification</b></a></li>
										@endif

									</ul>
								</div>
							</form>
						</li>
						@endauth
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icofont icofont-ui-user"></i>Account</a>
							<ul class="dropdown-menu dropdown-menu-right drophover">
								@auth
								<li><a href="{{ url('logout') }}">Logout</a></li>
								@else
								<li><a href="{{ url('/auth') }}">Login</a></li>
								<li><a href="{{ url('/authreg') }}">Registration</a></li>
								@endauth
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div id="logo">
					<a href="#"><img class="img-responsive" src="{{ asset('assets/images/logoup.png') }}" alt="logo" title="logo"/></a>
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12 paddleft">
				<div id="menu">	
					<nav class="navbar">
						<div class="collapse navbar-collapse navbar-ex1-collapse padd0">
							<nav>
								<ul class="nav navbar-nav">
									<li class="dropdown"><a href="{{ (url('/')) }}">Home</a></li>
									<li><a href="{{ url('/ruangan') }}">Room</a></li>
									<li><a href="{{ url('/daftarmenu') }}">List Menu</a></li>
								</ul>
							</nav>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>