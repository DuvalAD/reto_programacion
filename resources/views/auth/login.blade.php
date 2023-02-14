@extends('layouts.app')
@section('title-app') INICIAR SESSIÓN @endsection
@section('content-app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">INICIAR SESIÓN</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            @if (Session::has('success'))
                                <div class="col-md-12 mb-2">
                                    <div class="alert alert-success alert-dismissible fade show text-uppercase" role="alert" style="padding:6px">
                                        {{Session::get('success')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding:10px;"></button>
                                    </div>
                                </div>
                            @endif

                            
                            <div class="col-md-12 form-group mb-4">
                                <label for="username" class="col-md-4 col-form-label text-bold">USUARIO</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-right">CONTRASEÑA</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">RECUERDAME</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group mb-1">
                                <button type="submit" class="w-100 btn btn-primary">ENVIAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
