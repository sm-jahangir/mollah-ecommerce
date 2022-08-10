@extends('layouts.backend.app')

@section('title', 'Pages Add')
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
						<h1 class="m-0">Starter Page</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Starter Page</li>
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
										<a href="{{ route('app.category.index') }}" class="btn btn-success float-right">Go
											to
											List</a>
									</div>
								</div>
							</div>
							<form role="form" id="userFrom" method="Post" action="{{ isset($category) ? route('app.category.update', $category->id) : route('app.category.store') }}" enctype="multipart/form-data">
								@csrf
								@isset($category)
									@method('PUT')
								@endisset
								<div class="card-body">
									<div class="row">
										<div class="col-md-7">
											<div class="form-group">
												<label for="name">Category Name</label>
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $category->name ?? '' }}" placeholder="Enter Category Name" />
												@error('name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label for="category">Select Parent Category</label>
												<select class="js-example-basic-single form-control" name="parent_category" id="category">
													<option value="0">None</option>
													@foreach ($parent_category as $key => $parent_item)
														<option value="{{ $parent_item->id }}" @isset($category) {{ $category->parent_id == $parent_item->id ? 'selected' : '' }} @endisset>
															{{ $parent_item->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="image">Category Image(Optional)</label>
										<input type="file" name="image" id="image" class="dropify" @isset($category) data-default-file="{{ asset('uploads/category') . '/' . $category->icon_image }}" @endisset>
									</div>
									{{-- <input type="file" name="featured_image" id="featured_image" class="dropify @error('featured_image') is-invalid @enderror" @isset($property) data-default-file="{{ $property->getFirstMediaUrl('featured_image') ?? '' }}" @endisset /> --}}
									<div class="custom-control custom-switch">
										<input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" @isset($category) {{ $category->status == true ? 'checked' : '' }} @endisset />
										<label class="custom-control-label" for="customSwitch1">Status</label>
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

@push('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
	<script>
		//In your Javascript (external .js resource or <script> tag)
		$(document).ready(function() {
			$('.dropify').dropify();
		});
	</script>
@endpush
