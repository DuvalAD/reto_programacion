@extends('layouts.app')
@section('title-app') CAMBIO DE CONTRASEÑA @endsection
@section('content-app')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header">CAMBIO DE CONTRASEÑA</div>
                <div class="card-body">
                    <form action="{{route('user.password.edit')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            @if (Session::has('success'))
                                <div class="col-md-12 mb-2">
                                    <div class="alert alert-success alert-dismissible fade show text-uppercase" role="alert" style="padding:6px">
                                        {{Session::get('success')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding:10px;"></button>
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="col-md-12 mb-2">
                                    <div class="alert alert-danger alert-dismissible fade show text-uppercase" role="alert" style="padding:6px">
                                        {{Session::get('error')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding:10px;"></button>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12 form-group mb-2">
                                <label>ANTIGUA CONTRASEÑA:</label>
                                <input type="password" class="form-control" name="antigua_contrasenia">
                            </div>
                            <div class="col-md-12 form-group mb-2">
                                <label>NUEVA CONTRASEÑA:</label>
                                <input type="password" class="form-control" name="nueva_contrasenia">
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="w-100 btn btn-sm btn-success">ACTUALIZAR</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
