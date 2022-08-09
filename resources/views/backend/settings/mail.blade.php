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

                        <form id="settingsFrom" autocomplete="off" role="form" method="POST"
                            action="{{ route('app.settings.mail.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="mail_mailer">Mailer <code>{ key: mail_mailer
                                                    }</code></label>
                                            <input type="text" name="mail_mailer" id="mail_mailer"
                                                class="form-control @error('mail_mailer') is-invalid @enderror"
                                                value="{{ setting('mail_mailer') ?? old('mail_mailer') }}"
                                                placeholder="Mailer">
                                            @error('mail_mailer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="mail_encryption">Mail Encryption <code>{ key:
                                                    mail_encryption }</code></label>
                                            <input type="text" name="mail_encryption" id="mail_encryption"
                                                class="form-control @error('mail_encryption') is-invalid @enderror"
                                                value="{{ setting('mail_encryption') ?? old('mail_encryption') }}"
                                                placeholder="Encryption Type">
                                            @error('mail_encryption')
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
                                            <label for="mail_host">Mail Host <code>{ key: mail_host }</code></label>
                                            <input type="text" name="mail_host" id="mail_host"
                                                class="form-control @error('mail_host') is-invalid @enderror"
                                                value="{{ setting('mail_host') ?? old('mail_host') }}"
                                                placeholder="Mail Host">
                                            @error('mail_host')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="mail_port">Mail Port <code>{ key: mail_port }</code></label>
                                            <input type="text" name="mail_port" id="mail_port"
                                                class="form-control @error('mail_port') is-invalid @enderror"
                                                value="{{ setting('mail_port') ?? old('mail_port') }}"
                                                placeholder="Mail Port">
                                            @error('mail_port')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mail_username">Mail Username <code>{ key: mail_username
                                            }</code></label>
                                    <input type="text" name="mail_username" id="mail_username"
                                        class="form-control @error('mail_username') is-invalid @enderror"
                                        value="{{ setting('mail_username') ?? old('mail_username') }}"
                                        placeholder="Username">
                                    @error('mail_username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_password">Mail Password <code>{ key: mail_password
                                            }</code></label>
                                    <input type="password" name="mail_password" id="mail_password"
                                        class="form-control @error('mail_password') is-invalid @enderror"
                                        value="{{ setting('mail_password') ?? old('mail_password') }}"
                                        placeholder="Password">
                                    @error('mail_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_from_address">Mail From Address <code>{ key: mail_from_address
                                            }</code></label>
                                    <input type="email" name="mail_from_address" id="mail_from_address"
                                        class="form-control @error('mail_from_address') is-invalid @enderror"
                                        value="{{ setting('mail_from_address') ?? old('mail_from_address') }}"
                                        placeholder="From Address">
                                    @error('mail_from_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_from_name">Mail From Name <code>{ key: mail_from_name
                                            }</code></label>
                                    <input type="text" name="mail_from_name" id="mail_from_name"
                                        class="form-control @error('mail_from_name') is-invalid @enderror"
                                        value="{{ setting('mail_from_name') ?? old('mail_from_name') }}"
                                        placeholder="From Name">
                                    @error('mail_from_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
