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
										<h4>Orders List</h4>
									</div>
								</div>
							</div>
							<div class="card-body">

								<div class="table-responsive">
									<table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Sub Total</th>
												<th class="text-center">Discount</th>
												<th class="text-center">Tax</th>
												<th class="text-center">Total</th>
												<th class="text-center">Name</th>
												<th class="text-center">Mobile</th>
												<th class="text-center">Email</th>
												<th class="text-center">ZipCode</th>
												<th class="text-center">Status</th>
												<th class="text-center">Order Date</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($orders as $key => $order)
												<tr>
													<td class="text-center text-muted">#{{ $key + 1 }}</td>
													<td class="text-center">{{ $order->subtotal }}</td>
													<td class="text-center">{{ $order->discount }}</td>
													<td class="text-center">{{ $order->tax }}</td>
													<td class="text-center">{{ $order->total }}</td>
													<td class="text-center">{{ $order->firstname . ' ' . $order->lastname }}</td>
													<td class="text-center">{{ $order->mobile }}</td>
													<td class="text-center">{{ $order->email }}</td>
													<td class="text-center">{{ $order->zipcode }}</td>
													<td class="text-center">{{ $order->status }}</td>
													<td class="text-center">{{ $order->created_at->diffForHumans() }}</td>
													<td class="text-center">
														<a class="btn btn-info btn-sm" href="{{ route('app.orders.details', $order->id) }}"><i class="fas fa-edit"></i>
															<span>Details</span>
														</a>
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

@push('jd')
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
