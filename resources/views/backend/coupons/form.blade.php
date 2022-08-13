@extends('layouts.backend.app')

@section('title', 'Roles')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Coupon</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Coupon</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col">
										<h4>Users Registrations</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.coupons.index') }}" class="btn btn-success float-right">Go to
											List</a>
									</div>
								</div>
							</div>
							<form role="form" id="userFrom" method="Post" action="{{ isset($coupon) ? route('app.coupons.update', $coupon->id) : route('app.coupons.store') }}">
								@csrf
								@isset($coupon)
									@method('PUT')
								@endisset
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="code">Coupons Code</label>
												<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" value="{{ $coupon->code ?? '' }}" placeholder="Enter code Name" />
												@error('code')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="value">Parcetange</label>
												<input type="number" class="form-control @error('value') is-invalid @enderror" name="value" id="value" value="{{ $coupon->value ?? '' }}" placeholder="Enter value Name" />
												@error('value')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="cart_value">Cart Value</label>
												<input type="number" class="form-control @error('cart_value') is-invalid @enderror" name="cart_value" id="cart_value" value="{{ $coupon->cart_value ?? '' }}" placeholder="Enter cart_value Name" />
												@error('cart_value')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="expiry_date">Expiry Date</label>
												<input type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" id="expiry_date" value="{{ $coupon->expiry_date ?? '' }}" placeholder="Enter expiry_date Name" />
												@error('expiry_date')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted">
									<button type="submit" class="btn btn-primary">Added</button>
								</div>
							</form>
						</div>
					</div>
					<!-- /.col-md-6 -->
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
@endsection
