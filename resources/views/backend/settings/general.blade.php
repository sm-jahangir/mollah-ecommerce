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
						<h1 class="m-0">Setting</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Setting</li>
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
								<x-backend.settingnav-component />
							</div>

							<form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('app.settings.update') }}">
								@csrf
								@method('PATCH')
								<!-- general form elements -->
								<div class="card-body">
									<div class="form-group">
										<label for="site_title">Site Title <code>{ key: site_title }</code></label>
										<input type="text" name="site_title" id="site_title" class="form-control @error('site_title') is-invalid @enderror" value="{{ setting('site_title') ?? old('site_title') }}" placeholder="Site Title">
										@error('site_title')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="site_description">Site Description <code>{ key: site_description
												}</code></label>
										<textarea name="site_description" id="site_description" class="form-control @error('site_description') is-invalid @enderror">{{ setting('site_description') ?? old('site_description') }}</textarea>
										@error('site_description')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="form-group">
										<label for="site_address">Site Address <code>{ key: site_address }</code></label>
										<textarea name="site_address" id="site_address" class="form-control @error('site_address') is-invalid @enderror">{{ setting('site_address') ?? old('site_address') }}</textarea>
										@error('site_address')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<button type="button" class="btn btn-danger" onClick="resetForm('settingsFrom')">
										<i class="fas fa-redo"></i>
										<span>Reset</span>
									</button>

									<button type="submit" class="btn btn-primary">
										<i class="fas fa-arrow-circle-up"></i>
										<span>Update</span>
									</button>

								</div>
							</form>
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
