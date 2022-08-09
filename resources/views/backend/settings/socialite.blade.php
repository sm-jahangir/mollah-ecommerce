@extends('layouts.backend.app')

@section('title','Roles')
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
                    <h1 class="m-0">Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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
                            <x-backend.settingnav-component />
                        </div>

                        <form id="settingsFrom" method="POST" action="{{ route('app.settings.socialite.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="facebook_client_id">Facebook Client Id</label>
                                            <input type="text" name="facebook_client_id" id="facebook_client_id"
                                                class="form-control @error('mail_mailer') is-invalid @enderror"
                                                value="{{ setting('facebook_client_id') ?? old('facebook_client_id') }}"
                                                placeholder="Client Id">
                                            @error('facebook_client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="facebook_client_secret">Facebook Client Secret</label>
                                            <input type="text" name="facebook_client_secret" id="facebook_client_secret"
                                                class="form-control @error('facebook_client_secret') is-invalid @enderror"
                                                value="{{ setting('facebook_client_secret') ?? old('facebook_client_secret') }}"
                                                placeholder="Secret">
                                            @error('facebook_client_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="google_client_id">Google Client Id</label>
                                            <input type="text" name="google_client_id" id="google_client_id"
                                                class="form-control @error('mail_mailer') is-invalid @enderror"
                                                value="{{ setting('google_client_id') ?? old('google_client_id') }}"
                                                placeholder="Client Id">
                                            @error('google_client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="google_client_secret">Google Client Secret</label>
                                            <input type="text" name="google_client_secret" id="google_client_secret"
                                                class="form-control @error('google_client_secret') is-invalid @enderror"
                                                value="{{ setting('google_client_secret') ?? old('google_client_secret') }}"
                                                placeholder="Secret">
                                            @error('google_client_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="github_client_id">Github Client Id</label>
                                            <input type="text" name="github_client_id" id="github_client_id"
                                                class="form-control @error('mail_mailer') is-invalid @enderror"
                                                value="{{ setting('github_client_id') ?? old('github_client_id') }}"
                                                placeholder="Client Id">
                                            @error('github_client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="github_client_secret">Github Client Secret</label>
                                            <input type="text" name="github_client_secret" id="github_client_secret"
                                                class="form-control @error('github_client_secret') is-invalid @enderror"
                                                value="{{ setting('github_client_secret') ?? old('github_client_secret') }}"
                                                placeholder="Secret">
                                            @error('github_client_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" onClick="resetForm('settingsFrom')">
                                    <i class="fas fa-redo"></i>
                                    <span>Reset</span>
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    <span>Update</span>
                                </button>

                            </div>
                        </form>
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
        $(document).ready(function () {
            $('.dropify').dropify();
        });

    </script>
    @endpush
