@extends('layouts.backend.app')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Starter Page</h1>
						@role('admin')
							Admin Dashboard (Hi, Admin)
						@else
							Dashboard
						@endrole
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
				<div class="row">
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-info">
							<div class="inner">
								<h3>{{ $usersCount }}
								</h3>

								<p>Total Users</p>
							</div>
							<div class="icon">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
							<a href="{{ route('app.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-success">
							<div class="inner">
								{{-- <h3>{{ $rolesCount }}<sup style="font-size: 20px">%</sup></h3> --}}
								<h3>{{ $rolesCount }}</h3>
								<p>Roles</p>
							</div>
							<div class="icon">
								<i class="fas fa-palette"></i>
							</div>
							<a href="{{ route('app.roles.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-warning">
							<div class="inner">
								<h3>{{ $pagesCount }}</h3>

								<p>Total Pages</p>
							</div>
							<div class="icon">
								<i class="far fa-file"></i>
							</div>
							<a href="{{ route('app.pages.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-danger">
							<div class="inner">
								<h3>{{ $menusCount }}</h3>
								<p>Menus</p>
							</div>
							<div class="icon">
								<i class="fas fa-bars"></i>
							</div>
							<a href="{{ route('app.menus.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->


				<div class="row justify-content-center">
					<div class="col col-md-12">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<div class="row">
									<div class="col">
										<h4>User List</h4>
									</div>
									<div class="col">
										<a href="{{ route('app.users.create') }}" class="btn btn-success float-right">Create New</a>
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
															<img width="40" class="rounded-circle" src="{{ $user->avatar ? asset('uploads/users') . '/' . $user->avatar : config('app.placeholder') . '/' . '160' }}" alt="User Avatar">
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

				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>

								<p class="card-text">
									Some quick example text to build on the card title and make up the bulk of the card's
									content.
								</p>

								<a href="#" class="card-link">Card link</a>
								<a href="#" class="card-link">Another link</a>
							</div>
						</div>
					</div>
					<!-- /.col-md-6 -->
					<div class="col-lg-6">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h5 class="m-0">Featured</h5>
							</div>
							<div class="card-body">
								<h6 class="card-title">Special title treatment</h6>

								<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
