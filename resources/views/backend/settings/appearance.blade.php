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

							<form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('app.settings.appearance.update') }}" enctype="multipart/form-data">
								@csrf
								@method('PATCH')
								<div class="card-body">

									<div class="form-group">
										<label for="site_logo">Logo (Only Image are allowed) <code>{ key: site_logo
												}</code></label>
										<input type="file" name="site_logo" id="site_logo" class="dropify @error('site_logo') is-invalid @enderror" data-default-file="{{ setting('site_logo') != null ? asset('uploads/logos') . '/' . setting('site_logo') : '' }}">
										@error('site_logo')
											<span class="text-danger" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>


									<div class="form-group">
										<label for="site_favicon">Favicon (Only Image are allowed, Size: 33 X 33) <code>{
												key: site_favicon }</code></label>
										<input type="file" name="site_favicon" id="site_favicon" class="dropify @error('site_favicon') is-invalid @enderror" data-default-file="{{ setting('site_favicon') != null ? asset('uploads/logos') . '/' . setting('site_favicon') : '' }}">
										@error('site_favicon')
											<span class="text-danger" role="alert">
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
