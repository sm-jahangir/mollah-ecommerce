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
						<h1 class="m-0">Slider</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Slider</li>
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
										<h4>Sliders Registrations</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.tags.index') }}" class="btn btn-success float-right">Go to
											List</a>
									</div>
								</div>
							</div>
							<form role="form" id="pageFrom" method="POST" action="{{ isset($slider) ? route('app.slider.update', $slider->id) : route('app.slider.store') }}" enctype="multipart/form-data">
								@csrf
								@isset($slider)
									@method('PUT')
								@endisset
								<div class="row">
									<div class="col-md-8">
										<div class="main-card card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="title">Title</label>
															<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter slider title" value="{{ isset($slider) ? $slider->title : old('title') }}" required autocomplete="title" autofocus>
															@error('title')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="sub_title">Sub Title</label>
															<input id="sub_title" type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" placeholder="Enter slider sub_title" value="{{ isset($slider) ? $slider->sub_title : old('sub_title') }}" required autocomplete="sub_title" autofocus>
															@error('sub_title')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="excerpt">Excerpt</label>
															<textarea id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" rows="3">{{ isset($slider) ? $slider->excerpt : old('excerpt') }}</textarea>
															@error('excerpt')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
												</div>
											</div>
											<!-- /.card-body -->
										</div>
										<!-- /.card -->
									</div>
									<div class="col-md-4">
										<div class="main-card mb-3 card">
											<div class="card-body">
												<div class="form-group">
													<label for="slider_bg">Page Image (Only Image are allowed) </label>
													<input type="file" name="slider_bg" id="slider_bg" class="dropify @error('slider_bg') is-invalid @enderror" @isset($slider) data-default-file="{{ asset('uploads/slider') . '/' . $slider->slider_bg }}" @endisset>
													@error('slider_bg')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>

												<div class="form-group">
													<div class="custom-control custom-switch">
														<input type="checkbox" value="1" class="custom-control-input" id="status" name="status" @isset($slider) {{ $slider->status ? 'checked' : '' }} @endisset>
														<label class="custom-control-label" for="status">Published</label>
													</div>
													@error('status')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												{{-- position --}}
												<div class="form-group">
													<label for="title">Position</label>
													<div class="input-group">
														<select name="position">
															<option @isset($slider) {{ $slider->position == 'left' ? 'selected' : '' }} @endisset value="left">left</option>
															<option @isset($slider) {{ $slider->position == 'right' ? 'selected' : '' }} @endisset value="right">right</option>
															<option @isset($slider) {{ $slider->position == 'bottom' ? 'selected' : '' }} @endisset value="bottom">bottom</option>
															<option @isset($slider) {{ $slider->position == 'top' ? 'selected' : '' }} @endisset value="top">top</option>
														</select>
													</div>
												</div>

											</div>
										</div>
										<!-- /.card -->
									</div>

								</div>

								<div class="card m-2">
									<div class="card-body">

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="button_1">Button One Text</label>
													<input type="text" class="form-control" name="button_1" id="button_1" placeholder="Enter Your Button Name" value="{{ isset($slider) ? $slider->button_1 : '' }}" />
												</div>
											</div>

											<div class="col-md-2">
												<div class="form-group">
													<label for="button_1_bg_color">Background Color</label>
													<input type="color" class="form-control" value="{{ isset($slider) ? $slider->button_1_bg_color : '' }}" name="button_1_bg_color" id="button_1_bg_color" placeholder="#FFFFFF" />
												</div>
											</div>
											<div class="col-md-6 float-right">
												<div class="form-group">
													<label for="button_1_link">Button One Link</label>
													<input type="text" class="form-control" name="button_1_link" id="button_1_link" placeholder="Enter Your Button Link" value="{{ isset($slider) ? $slider->button_1_link : '' }}" />
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card m-2">
									<div class="card-body">

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="button_two">Button Two Text</label>
													<input type="text" class="form-control" name="button_two" id="button_two" placeholder="Enter Your Button Name" value="{{ isset($slider) ? $slider->button_2 : '' }}" />
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label for="button_2_bg_color">Background Color</label>
													<input type="color" class="form-control" name="button_2_bg_color" id="button_2_bg_color" placeholder="#FFFFFF" value="{{ isset($slider) ? $slider->button_2_bg_color : '' }}" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="button_two_link">Button Two Link</label>
													<input type="text" class="form-control" name="button_two_link" id="button_two_link" placeholder="Enter Your Button Link" value="{{ isset($slider) ? $slider->button_2_link : '' }}" />
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button type="button" class="btn btn-danger mr-2">Reset</button>
									<button type="submit" class="btn btn-primary">Submit</button>
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
