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
						<h1 class="m-0">Coupon List</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Coupon List</li>
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
										<h4>Coupon List</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.coupons.create') }}" class="btn btn-success float-right">Create
											New</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Code</th>
												<th class="text-center">Expiry Date</th>
												<th class="text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($coupons as $key => $coupon)
												<tr>
													<td class="text-center text-muted">#{{ $key + 1 }}</td>
													<td class="text-center">
														{{ $coupon->code }}
													</td>
													<td class="text-center">{{ $coupon->expiry_date }}</td>
													<td class="text-center">
														<a class="btn btn-info btn-sm" href="{{ route('app.coupons.edit', $coupon->id) }}"><i class="fas fa-edit"></i>
															<span>Edit</span>
														</a>
														<button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $coupon->id }})">
															<i class="fas fa-trash-alt"></i>
															<span>Delete</span>
														</button>
														<form id="delete-form-{{ $coupon->id }}" action="{{ route('app.coupons.destroy', $coupon->id) }}" method="POST" style="display: none;">
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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
