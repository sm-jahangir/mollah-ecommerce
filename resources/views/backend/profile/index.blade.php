@extends('layouts.backend.app')

@section('title', 'Roles')
@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
	<style>
		.dropify-wrapper .dropify-message p {
			font-size: initial;
		}
	</style>
@endpush
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Profile</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Profile</li>
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
										<h4>Our Information</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.profile.changepassindex') }}" class="btn btn-success float-right">Change Password</a>
									</div>
								</div>
							</div>
							<form method="POST" action="{{ route('app.profile.update') }}" enctype="multipart/form-data">
								@csrf
								<div class="card-body">
									<div class="row">
										<div class="col col-md-8">
											<div class="form-group">
												<label for="name">Name</label>
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ Auth::user()->name }}" placeholder="Name" required autofocus />
												@error('name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="email" />
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

											<div class="form-group">
												<label for="current_password">Current Password <small><strong>(Optional)</strong></small></label>
												<input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" placeholder="******" />
												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="password">Password <small><strong>(Optional)</strong></small></label>
														<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="******" />
														@error('password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="confirm_password">Confirm Password <small><strong>(Optional)</strong></small></label>
														<input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="confirm_password" placeholder="******" />
														@error('password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
											</div>

											<div class="custom-control custom-switch">
												<input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" {{ Auth::user()->status == true ? 'checked' : '' }} />
												<label class="custom-control-label" for="customSwitch1">Status</label>
											</div>
										</div>
										<div class="col col-md-4">
											<div class="form-group">
												<label for="avatar">Avatar</label>
												<input type="file" name="avatar" id="avatar" class="dropify @error('avatar') is-invalid @enderror" data-default-file="{{ asset('uploads/users') . '/' . Auth::user()->avatar ?? '' }}" />

												@error('avatar')
													<span class="text-danger" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted">
									<button type="submit" class="btn btn-primary">Update</button>
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
@push('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
	<script>
	 //In your Javascript (external .js resource or <script> tag)
	 $(document).ready(function() {
	  $('.dropify').dropify();
	 });
	</script>
@endpush
