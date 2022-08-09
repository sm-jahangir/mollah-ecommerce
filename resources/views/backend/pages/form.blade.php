@extends('layouts.backend.app')

@section('title', 'Pages Add')
@push('css')
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
						<h1 class="m-0">Page</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Page</li>
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
										<h4>Pages Create</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.pages.index') }}" class="btn btn-success float-right">Go to
											List</a>
									</div>
								</div>
							</div>
							<form role="form" id="pageFrom" method="POST" action="{{ isset($page) ? route('app.pages.update', $page->id) : route('app.pages.store') }}" enctype="multipart/form-data">
								@csrf
								@isset($page)
									@method('PUT')
								@endisset
								<div class="row">
									<div class="col-md-8">
										<div class="main-card card">
											<div class="card-body">
												<div class="form-group">
													<label for="title">Title</label>
													<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter page title" value="{{ isset($page) ? $page->title : old('title') }}" required autocomplete="title" autofocus>
													@error('title')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>

												<div class="form-group">
													<label for="slug">Slug</label>
													<input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Enter page url (unique)" value="{{ isset($page) ? $page->slug : old('slug') }}" autocomplete="slug" required autofocus>
													@error('slug')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>

												<div class="form-group">
													<label for="excerpt">Excerpt</label>
													<textarea id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" rows="3">{{ isset($page) ? $page->excerpt : old('excerpt') }}</textarea>
													@error('excerpt')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>

												<div class="form-group">
													<label for="body">Body</label>
													<textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" rows="5">{{ isset($page) ? $page->body : old('body') }}</textarea>
													@error('body')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
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
													<label for="image">Page Image (Only Image are allowed) </label>
													<input type="file" name="image" id="image" class="dropify @error('image') is-invalid @enderror" @isset($page) data-default-file="{{ asset('uploads/page') . '/' . $page->featured_image }}" @endisset />
													@error('image')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror

												</div>

												<div class="form-group">
													<div class="custom-control custom-switch">
														<input type="checkbox" value="1" class="custom-control-input" id="status" name="status" @isset($page) {{ $page->status ? 'checked' : '' }} @endisset>
														<label class="custom-control-label" for="status">Published</label>
													</div>
													@error('status')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
										</div>
										<!-- /.card -->
										<div class="main-card mb-3 card">
											<div class="card-body">

												<div class="form-group">
													<label for="meta_description">Meta Description</label>
													<textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" rows="4">{{ isset($page) ? $page->meta_description : old('meta_description') }}</textarea>
													@error('meta_description')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>

												<div class="form-group">
													<label for="meta_keywords">Meta Keywords</label>
													<textarea id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" rows="3">{{ isset($page) ? $page->meta_keywords : old('meta_keywords') }}</textarea>
													@error('meta_keywords')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
										</div>
										<!-- /.card -->
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
	<script src="https://cdn.tiny.cloud/1/7eok9esr60wcbm3nz1aw6c7qp77jvpw9w8nwjshtqlqk2u03/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<script>
	 tinymce.init({
	  selector: '#body',
	  plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
	  imagetools_cors_hosts: ['picsum.photos'],
	  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | preview | insertfile image media link anchor codesample | ltr rtl',
	  toolbar_sticky: true,
	  image_advtab: true,
	  importcss_append: true,
	  height: 400,
	  image_caption: true,
	  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
	  noneditable_noneditable_class: "mceNonEditable",
	  toolbar_mode: 'sliding',
	  contextmenu: "link image imagetools table",
	 });
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
	<script>
	 //In your Javascript (external .js resource or <script> tag)
	 $(document).ready(function() {
	  $('.dropify').dropify();
	 });
	</script>
@endpush
