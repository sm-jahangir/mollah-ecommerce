@extends('layouts.backend.app')

@section('title','Roles')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role Base Permission Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role Base Permission Form</li>
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
                                    <h4>Role Add</h4>
                                </div>
                                <div class="col">
                                    <a href="{{ route('app.roles.index') }}" class="btn btn-success float-right">Go to List</a>
                                </div>
                            </div>
                        </div>
                        <form id="roleFrom" role="form" method="POST"
                            action="{{ isset($role) ? route('app.roles.update',$role->id) : route('app.roles.store') }}">
                            @csrf
                            @if (isset($role))
                            @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name ?? ''  }}" placeholder="Enter role name" required autofocus />
                                    @error('name')
                                    <p class="p-2">
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <strong>Manage permissions for Role</strong>
                                    @error('permissions')
                                    <p class="p-2">
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="select-all">
                                        <label class="custom-control-label" for="select-all">Select All</label>
                                    </div>
                                </div>
                                @forelse($modules->chunk(2) as $key => $chunks)
                                <div class="form-row">
                                    @foreach($chunks as $key=>$module)
                                    <div class="col">
                                        <h5>Module: {{ $module->name }}</h5>
                                        @foreach($module->permissions as $key=>$permission)
                                        <div class="mb-3 ml-4">
                                            <div class="custom-control custom-switch mb-2">
                                                <input type="checkbox" class="custom-control-input" 
                                                id="permission-{{ $permission->id }}" 
                                                value="{{ $permission->id }}" 
                                                name="permissions[]" 
                                                @if(isset($role)) 
                                                    @foreach($role->permissions as $rPermission) {{ $permission->id == $rPermission->id ? 'checked' : '' }}  @endforeach
                                                @endif
                                                />
                                                <label class="custom-control-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                                @empty
                                <div class="row">
                                    <div class="col text-center">
                                        <strong>No Module Found.</strong>
                                    </div>
                                </div>
                                @endforelse

                                <button type="button" class="btn btn-danger" onClick="resetForm('roleFrom')">
                                    <i class="fas fa-redo"></i>
                                    <span>Reset</span>
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    @isset($role)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    <span>Update</span>
                                    @else
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Create</span>
                                    @endisset
                                </button>
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
<script type="text/javascript">
    // Listen for click on toggle checkbox
    $('#select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });

</script>
@endpush
