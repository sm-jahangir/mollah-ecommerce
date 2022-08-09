<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('app.dashboard') }}" class="brand-link">
		<img src="{{ asset('assets/backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Molla Ecom</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ isset(Auth::user()->avatar) ? asset('uploads/users') . '/' . Auth::user()->avatar : asset('assets/backend') . '/' . 'dist/img/user2-160x160.jpg' }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ Auth::user()->name }}</a>
				<small class="text-white">{{ Auth::user()->role->name }}</small>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				@foreach ($items as $item)
					@if ($item->type == 'divider')
						<li style="color: white; font-weight: bold; margin-left: 18px;" class="nav-item">{{ $item->divider_title }}</li>
					@else
						@if ($item->childs->isEmpty())
							<li class="nav-item">
								<a href="{{ $item->url }}" class="nav-link {{ Request::is(ltrim($item->url, '/') . '*') ? 'active' : '' }}">
									<i class="nav-icon {{ $item->icon_class }}"></i>
									<p>
										{{ $item->title }}
									</p>
								</a>
							</li>
						@else
							<li @foreach ($item->childs as $child) @if (Request::is(ltrim($child->url, '/') . '*'))
									class="nav-item menu-open"
									@break
								@else
								class="nav-item" @endif @endforeach
								>
								<a href="{{ $item->url }}" @foreach ($item->childs as $child) @if (Request::is(ltrim($child->url, '/') . '*'))
									class="nav-link active"
									@break
								@else
								class="nav-link" @endif @endforeach
									>
									<i class="nav-icon {{ $item->icon_class }}"></i>
									<p>
										{{ $item->title }}
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									@foreach ($item->childs as $child)
										<li class="nav-item">
											<a href="{{ $child->url }}" class="nav-link {{ Request::is(ltrim($child->url, '/') . '*') ? 'active' : '' }}">
												<i class="far {{ $child->icon_class }}"></i>
												<p>{{ $child->title }}</p>
											</a>
										</li>
									@endforeach
								</ul>
							</li>
						@endif
					@endif
				@endforeach
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
