@extends('layouts.backend.app')

@section('title', 'Pages Add')
@push('css')
	{{-- BS Stepper --}}
	<link rel="stylesheet" href="{{ asset('assets/backend/plugins/bs-stepper/css/bs-stepper.min.css') }}">
	{{-- Select2 --}}
	<link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css') }}">

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
						<h1 class="m-0">Product Create</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Product Create</li>
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
						<div class="card card-default">
							<div class="card-body p-0">
								<div class="bs-stepper">
									<div class="bs-stepper-header" role="tablist">
										<!-- your steps here -->
										<div class="step" data-target="#general-part">
											<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
												<span class="bs-stepper-circle">1</span>
												<span class="bs-stepper-label">General</span>
											</button>
										</div>
										<div class="line"></div>
										<div class="step" data-target="#specification-part">
											<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
												<span class="bs-stepper-circle">2</span>
												<span class="bs-stepper-label">Specification</span>
											</button>
										</div>
										<div class="line"></div>
										<div class="step" data-target="#price-part">
											<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
												<span class="bs-stepper-circle">3</span>
												<span class="bs-stepper-label">Price</span>
											</button>
										</div>
										<div class="line"></div>
										<div class="step" data-target="#image-part">
											<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
												<span class="bs-stepper-circle">4</span>
												<span class="bs-stepper-label">Images</span>
											</button>
										</div>
										<div class="line"></div>
										<div class="step" data-target="#seo-part">
											<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
												<span class="bs-stepper-circle">5</span>
												<span class="bs-stepper-label">SEO</span>
											</button>
										</div>
										<div class="line"></div>
										<div class="step" data-target="#information-part">
											<button type="button" class="step-trigger" role="tab" aria-controls="information-part"
												id="information-part-trigger">
												<span class="bs-stepper-circle">6</span>
												<span class="bs-stepper-label">Various information</span>
											</button>
										</div>
									</div>
									<hr>
									<div class="bs-stepper-content">
										<form action="{{ isset($product) ? route('app.product.update', $product->id) : route('app.product.store') }}"
											method="POST" enctype="multipart/form-data">

											@isset($product)
												@method('PUT')
											@endisset
											@csrf
											<!-- General steps content here -->
											<div id="general-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
												<div class="form-group">
													<label for="productInputTitle">Product Title</label>
													<input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
														id="productInputTitle" value="{{ isset($product) ? $product->title : old('title') }}" required
														placeholder="Enter Product Title" />
													@error('title')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<div class="form-group">
													<label for="productShortDescription">Short Description</label>
													<textarea class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="productShortDescription"
              cols="30" rows="5">{{ isset($product) ? $product->excerpt : old('excerpt') }}</textarea>
													@error('excerpt')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<div class="form-group">
													<label for="productDescription">Description</label>
													<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="productDescription"
              cols="30" rows="5">{{ isset($product) ? $product->description : old('description') }}</textarea>
													@error('description')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
											</div>
											<!-- Specification steps content here -->
											<div id="specification-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Product SKU</label>
															<input class="form-control @error('sku') is-invalid @enderror" placeholder="Enter Your SKU" type="text"
																name="sku" id="sku" value="{{ isset($product) ? $product->sku : old('sku') }}" required>
															@error('sku')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Categories</label>
															<select name="categories[]" class="select2 select2-hidden-accessible" multiple=""
																data-placeholder="Select a Color" style="width: 100%;" data-select2-id="13" tabindex="-1"
																aria-hidden="true">
																@foreach ($categories as $category)
																	<option
																		@isset($product) @foreach ($product->categories as $product_cat)
                                                                    		{{ $product_cat->id == $category->id ? 'selected' : '' }}

                                                                		@endforeach @endisset
																		value="{{ $category->id }}">{{ $category->name }}</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Tags</label>
															<select name="tags[]" class="select2 select2-hidden-accessible" multiple=""
																data-placeholder="Select a Color" style="width: 100%;" data-select2-id="12" tabindex="-1"
																aria-hidden="true">
																@foreach ($tags as $tag)
																	<option
																		@isset($product) @foreach ($product->tags as $product_tag)
                                                                    		{{ $product_tag->id == $tag->id ? 'selected' : '' }}

                                                                		@endforeach @endisset
																		value="{{ $tag->id }}">{{ $tag->name }}</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Brand</label>
															<select name="brand_id" class="custom-select" style="width: 100%;">
																@foreach ($brands as $brand)
																	<option
																		@isset($product) {{ $product->brand_id == $brand->id ? 'selected' : '' }} @endisset
																		value="{{ $brand->id }}">{{ $brand->name }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Color</label>
															<select name="colors" class="select2 select2-hidden-accessible" multiple=""
																data-placeholder="Select a Color" style="width: 100%;" data-select2-id="8" tabindex="-1"
																aria-hidden="true">
																@foreach ($colors as $color)
																	<option
																		@isset($product) @foreach ($product->colors as $product_color)
																	{{ $product_color->id == $color->id ? 'selected' : '' }}

																@endforeach @endisset
																		value="{{ $color->id }}">{{ $color->name }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Size</label>
															<select name="sizes" class="select2 select2-hidden-accessible" multiple=""
																data-placeholder="Select a Color" style="width: 100%;" data-select2-id="9" tabindex="-1"
																aria-hidden="true">
																@foreach ($sizes as $size)
																	<option
																		@isset($product) @foreach ($product->sizes as $product_size)
																	{{ $product_size->id == $size->id ? 'selected' : '' }}

																@endforeach @endisset
																		value="{{ $size->id }}">{{ $size->name }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Product Collection</label>
															<select name="product_collections" class="custom-select">
																<option
																	@isset($product) {{ $product->product_collections == 'New Arrival' ? 'selected' : '' }} @endisset>
																	New Arrival</option>
																<option
																	@isset($product) {{ $product->product_collections == 'Best Sellers' ? 'selected' : '' }} @endisset>
																	Best Sellers</option>
																<option
																	@isset($product) {{ $product->product_collections == 'Special Offer' ? 'selected' : '' }} @endisset>
																	Special Offer</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Label</label>
															<select name="labels" class="custom-select">
																<option
																	@isset($product) {{ $product->labels == 'Hot' ? 'selected' : '' }} @endisset>Hot
																</option>
																<option
																	@isset($product) {{ $product->labels == 'New' ? 'selected' : '' }} @endisset>New
																</option>
																<option
																	@isset($product) {{ $product->labels == 'Sale' ? 'selected' : '' }} @endisset>
																	Sale</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="weight">Product Weight</label>
															<input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Weight in Gram"
																value="{{ isset($product) ? $product->weight : old('weight') }}" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="height">Height</label>
															<input type="text" class="form-control" name="height" id="height" placeholder="Enter height in cm"
																value="{{ isset($product) ? $product->height : old('height') }}" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="length">Product length</label>
															<input type="text" class="form-control" name="length" id="length" placeholder="Enter length in cm"
																value="{{ isset($product) ? $product->length : old('length') }}" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="wide">wide</label>
															<input type="text" class="form-control" name="wide" id="wide" placeholder="Enter wide in cm"
																value="{{ isset($product) ? $product->wide : old('wide') }}" required>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
												<button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
											</div>
											<!-- Price steps content here -->
											<div id="price-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="productInputPrice">Product Price</label>
															<input type="text" class="form-control" name="price" id="productInputPrice"
																placeholder="Enter Product Price" value="{{ isset($product) ? $product->price : old('price') }}"
																required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="productInputSalePrice">Product Sale Price</label>
															<input type="text" class="form-control" name="sale_price" id="productInputSalePrice"
																placeholder="Enter Product Sale Price"
																value="{{ isset($product) ? $product->sale_price : old('sale_price') }}" required>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
												<button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
											</div>
											<!-- Images steps content here -->
											<div id="image-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

												<div class="form-group">
													<label for="image">Product Image(Optional)</label>
													<input type="file" name="featured_image" id="image" class="dropify"
														@isset($product) data-default-file="{{ asset('storage/products') . '/' . $product->featured_image }}" @endisset>
												</div>
												<div class="form-group">
													<label for="gallery">Product Gallery (Optional)</label>
													<input type="file" name="images[]" id="gallery" multiple>
												</div>
												<button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
												<button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
											</div>
											<!-- SEO steps content here -->
											<div id="seo-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

												<div class="form-group">
													<label for="productInputPrice">Slug will be generate automatically using Title</label>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="meta_keywords">Meta Keywords</label>
															<input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
																placeholder="Enter Product Price"
																value="{{ isset($product) ? $product->meta_keywords : old('meta_keywords') }}" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="meta_description">Meta Description</label>
															<input type="text" class="form-control" name="meta_description" id="meta_description"
																placeholder="Enter Product Sale Price"
																value="{{ isset($product) ? $product->meta_description : old('meta_description') }}" required>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
												<button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
											</div>
											<div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
												<div class="row">
													<div class="col-md-3">
														<label for="featured">Featured Product</label>
														<input type="checkbox" name="featured" data-bootstrap-switch data-off-color="danger"
															data-on-color="success"
															@isset($product) {{ $product->featured == true ? 'checked' : '' }} @endisset>
													</div>
													<div class="col-md-3">
														<label for="trending">trending Product</label>
														<input type="checkbox" name="trending" data-bootstrap-switch data-off-color="danger"
															data-on-color="success"
															@isset($product) {{ $product->trending == true ? 'checked' : '' }} @endisset>
													</div>
													<div class="col-md-3">
														<label for="popular">popular Product</label>
														<input type="checkbox" name="popular" data-bootstrap-switch data-off-color="danger" data-on-color="success"
															@isset($product) {{ $product->popular == true ? 'checked' : '' }} @endisset>
													</div>
													<div class="col-md-3">
														<label for="featured">Product Status</label>
														<input type="checkbox" name="status" data-bootstrap-switch
															@isset($product) {{ $product->status == true ? 'checked' : '' }} @endisset>
													</div>
													<div class="col-md-12 d-flex mt-3">
														<label class="mr-2">Shop</label>
														<select name="user_id" class="custom-select w-50">
															@foreach ($users as $user)
																<option
																	@isset($product) {{ $product->user_id == $user->id ? 'selected' : '' }} @endisset
																	value="{{ $user->id }}">{{ $user->name }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<br>
												<br>
												<button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
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
	{{-- BS Stepper --}}
	<script src="{{ asset('assets/backend/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
	{{-- Select 2 --}}
	<script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js') }}"></script>
	<!-- Bootstrap Switch -->
	<script src="{{ asset('assets/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
	<script>
	 //In your Javascript (external .js resource or <script> tag)
	 $(document).ready(function() {
	  $('.dropify').dropify();
	 });
	 // BS-Stepper Init
	 document.addEventListener('DOMContentLoaded', function() {
	  window.stepper = new Stepper(document.querySelector('.bs-stepper'))
	 })
	 //  Switch
	 $("input[data-bootstrap-switch]").each(function() {
	  $(this).bootstrapSwitch('state', $(this).prop('checked'));
	 })

	 //  Select2 Init

	 $(document).ready(function() {
	  //Initialize Select2 Elements
	  $('.select2').select2()

	  //Initialize Select2 Elements
	  $('.select2bs4').select2({
	   theme: 'bootstrap4'
	  })
	 });
	</script>
@endpush
