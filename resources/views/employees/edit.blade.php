@extends('layouts.app')
@section('title-app') EDITAR EMPLEADO @endsection
@section('content-app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex">
                        <div>EDITAR EMPLEADO</div>
                        <div class="ml-auto"><a href="{{route('employee.view')}}" class="btn btn-sm btn-warning">LISTA DE EMPLEADOS</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('employee.edit.post')}}" method="POST">
                        <input type="hidden" name="employee_id" value="{{$user->id}}">
                        @csrf
                        {{-- @dump($user) --}}
                        <div class="row mb-3">
                            <div class="col-md-6 form-group mb-2">
                                <label for="identificacion" class="text-md-right">CÉDULA:</label>
                                <input id="identificacion" type="text" class="form-control @error('identificacion') is-invalid @enderror" value="{{old('identificacion', $user->identification)}}" name="identificacion" required autocomplete="off">
                                @error('identificacion')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="nombres" class="text-md-right">NOMBRES:</label>
                                <input id="nombres" type="text" class="form-control text-uppercase @error('nombres') is-invalid @enderror" value="{{old('nombres', $user->first_name)}}" name="nombres" required autocomplete="off">
                                @error('nombres')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="apellidos" class="text-md-right">APELLIDOS:</label>
                                <input id="apellidos" type="text" class="form-control text-uppercase @error('apellidos') is-invalid @enderror" value="{{old('apellidos', $user->last_name)}}" name="apellidos" required autocomplete="off">
                                @error('apellidos')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="correo" class="text-md-right">CORREO:</label>
                                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror"value="{{old('correo', $user->email) }}"  name="correo" required autocomplete="off">
                                @error('correo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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


@section('content-app')

@endsection
