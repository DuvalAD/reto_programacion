@extends('layouts.app')
@section('title-app') NUEVO EMPLEADO @endsection
@section('content-app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex">
                        <div>NUEVO EMPLEADO</div>
                        <div class="ml-auto"><a href="{{route('employee.view')}}" class="btn btn-sm btn-warning">LISTA DE EMPLEADOS</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('employee.create')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 form-group mb-2">
                                <label for="identificacion" class="text-md-right">CÉDULA:</label>
                                <input id="identificacion" type="text" class="form-control @error('identificacion') is-invalid @enderror" value="{{ old('identificacion') }}" name="identificacion" required autocomplete="off" placeholder="1314971266">
                                @error('identificacion')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="nombres" class="text-md-right">NOMBRES:</label>
                                <input id="nombres" type="text" class="form-control text-uppercase @error('nombres') is-invalid @enderror" value="{{ old('nombres') }}" name="nombres" required autocomplete="off" placeholder="DUVAL">
                                @error('nombres')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="apellidos" class="text-md-right">APELLIDOS:</label>
                                <input id="apellidos" type="text" class="form-control text-uppercase @error('apellidos') is-invalid @enderror" value="{{ old('apellidos') }}" name="apellidos" required autocomplete="off" placeholder="ALCIVAR DEMERA">
                                @error('apellidos')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="correo" class="text-md-right">CORREO:</label>
                                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror"value="{{ old('correo') }}"  name="correo" required autocomplete="off" placeholder="duval@dominio.com">
                                @error('correo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="w-100 btn btn-sm btn-success">REGISTRAR</a>
                            </div>
                        </div>
                    </form>

                    <!-- Filters -->
                    {{-- <form action="" method="get">
                    <div class="row mb-4">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="search_vaccine">ESTADO VACUNA:</label>
                                <select class="form-select text-uppercase" id="search_vaccine" name="search_vaccine" >
                                    <option value="" {{$search_vaccine == null ? 'selected' : ''}}>SELECCIONAR....</option>
                                    <option value="true" {{$search_vaccine == "true" ? 'selected' : ''}}>VACUNADO</option>
                                    <option value="false" {{$search_vaccine == "false" ? 'selected' : ''}}>NO VACUNADO</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="search_vaccine">TIPO VACUNA:</label>
                                <select class="form-select text-uppercase" id="search_vaccine" name="search_vaccine" >
                                    <option value="" {{$search_vaccine == null ? 'selected' : ''}}>SELECCIONAR....</option>
                                    @foreach ($vaccines as $item)
                                    <option value="{{$item->id}}" {{$search_vaccine == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <label for="search_vaccine">FECHA DE VACUNACIÓN:</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control text-uppercase" name="search_date_start" value="{{$search_date_start != null ? date('Y-m-d' , strototime($search_date_start)) : null}}">
                                    <span class="input-group-text">-</span>
                                    <input type="date" class="form-control text-uppercase" name="search_date_end" value="{{$search_date_end != null ? date('Y-m-d' , strototime($search_date_end)) : null}}">
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-12">
                                <label style="color:transparent;">btn</label>
                                <div><button type="submit" class="w-100 btn btn-sm btn-success">BUSCAR REGISTROS</button></div>
                            </div>
                        </div>
                    </form>

                    <!-- Data -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table_cust table-striped table-hover">
                                    <thead class="table-success">
                                        <tr>
                                            <th>N°</th>
                                            <th>APELLIDOS</th>
                                            <th>NOMBRES</th>
                                            <th>CÉDULA</th>
                                            <th>CORREO</th>
                                            <th>TELÉFONO</th>
                                            <th>FECHA NACIMIENTO</th>
                                            <th>ESTADO VACUNACIÓN</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employees as $item)
                                            <tr>
                                                <td>{{$rank++}}</td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="100">NO SE ENCONTRARÓN REGISTROS</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('content-app')

@endsection
