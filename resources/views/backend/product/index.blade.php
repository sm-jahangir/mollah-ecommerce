@extends('layouts.backend.app')

@section('title', 'Categorys')

@push('css')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('assets/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Products Page</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Products Page</li>
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
										<h4>Product List</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.product.create') }}" class="btn btn-success float-right">Create New</a>
									</div>
								</div>
							</div>
							<div class="card-body">

								<div class="table-responsive">
									<table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Gallery</th>
												<th class="text-center">Name</th>
												<th class="text-center">Sale Price</th>
												<th class="text-center">Last Update</th>
												<th class="text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($products as $key => $product)
												<tr>
													<td class="text-center text-muted">#{{ $key + 1 }}</td>

													<td class="text-center">
														{{-- @php
																$x = json_decode($post->gallery);
															@endphp
																@foreach ((array) $x as $key => $val)
																	<img width="50px" src="{{ asset('backend/gallery/' . $val) }}">
																@endforeach --}}
														{{-- jodi controller e Post::all() kore return korto tahole ekhane decode korte holo --}}

														@foreach ((array) $product->gallery as $item)
															<img width="50px" src="{{ asset('uploads/products/gallery/' . $item) }}">
														@endforeach
													</td>

													<td width="20%" class="text-center">{{ $product->title }}</td>
													<td class="text-center">{{ $product->sale_price }}</td>
													<td class="text-center">{{ $product->updated_at->diffForHumans() }}</td>
													<td class="text-center">
														<a class="btn btn-info btn-sm" href="{{ route('app.product.edit', $product->id) }}"><i class="fas fa-edit"></i>
															<span>Edit</span>
														</a>
														<button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $product->id }})">
															<i class="fas fa-trash-alt"></i>
															<span>Delete</span>
														</button>
														<form id="delete-form-{{ $product->id }}" action="{{ route('app.product.destroy', $product->id) }}" method="POST" style="display: none;">
															@csrf()
															@method('DELETE')
														</form>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
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
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('assets/backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{ asset('assets/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


	<script>
		$(document).ready(function() {
			// Datatable
			$("#datatable").DataTable();
		});

		function deleteData(id) {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					document.getElementById('delete-form-' + id).submit();
				}
			})
		}
	</script>
@endpush
