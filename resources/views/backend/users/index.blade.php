@extends('layouts.backend.app')

@section('title', 'Users')

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
						<h1 class="m-0">User Page</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">User Page</li>
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
										<h4>User List</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.users.create') }}" class="btn btn-primary float-right">
											User Create
										</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Name</th>
												<th class="text-center">Email</th>
												<th class="text-center">Status</th>
												<th class="text-center">Joined At</th>
												<th class="text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($users as $key => $user)
												<tr>
													<td class="text-center text-muted">#{{ $key + 1 }}</td>
													<td class="text-center">
														<div class="widget-content-wrapper float-left">
															<img width="40" class="rounded-circle" src="{{ $user->avatar ? asset('uploads/users') . '/' . $user->avatar : config('app.placeholder') . '/' . '350x150' }}" alt="User Avatar">
														</div>
														<div>
															{{ $user->name }} <br>
															@if ($user->role)
																<span class="badge badge-info">{{ $user->role->name }}</span>
															@else
																<span class="badge badge-danger">No role found :(</span>
															@endif
														</div>
													</td>
													<td class="text-center">
														{{ $user->email }}
													</td>
													<td class="text-center">
														@if ($user->status)
															<div class="badge badge-success">Active</div>
														@else
															<div class="badge badge-danger">Inactive</div>
														@endif
													</td>
													<td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
													<td class="text-center">
														<a class="btn btn-secondary btn-sm" href="{{ route('app.users.show', $user->id) }}"><i class="fas fa-eye"></i>
															<span>Show</span>
														</a>
														<a class="btn btn-info btn-sm" href="{{ route('app.users.edit', $user->id) }}"><i class="fas fa-edit"></i>
															<span>Edit</span>
														</a>
														<button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $user->id }})">
															<i class="fas fa-trash-alt"></i>
															<span>Delete</span>
														</button>
														<form id="delete-form-{{ $user->id }}" action="{{ route('app.users.destroy', $user->id) }}" method="POST" style="display: none;">
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
