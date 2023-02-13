@extends('layouts.app')
@section('title-app') LISTA DE EMPLEADOS @endsection
@section('content-app')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">PERFIL</div>
                <div class="card-body">
                    <form action="{{route('employee.create')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 form-group mb-2">
                                <label for="identificacion" class="text-md-right">CÉDULA:</label>
                                <input id="identificacion" type="text" class="form-control"  value="{{$user->identification}}" readonly>
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="nombres" class="text-md-right">NOMBRES:</label>
                                <input id="nombres" type="text" class="form-control"  value="{{$user->first_name}}" readonly>
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="apellidos" class="text-md-right">APELLIDOS:</label>
                                <input id="apellidos" type="text" class="form-control"  value="{{$user->last_name}}" readonly>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label for="correo" class="text-md-right">CORREO:</label>
                                <input id="correo" type="text" class="form-control"  value="{{$user->email}}" readonly>
                            </div>

                            <hr>

                            <div class="col-md-6 form-group mb-2">
                                <label for="correo" class="text-md-right">CORREO:</label>
                                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror"value="{{ old('correo') }}"  name="correo" required autocomplete="off" placeholder="duval@dominio.com">
                                @error('correo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="correo" class="text-md-right">CORREO:</label>
                                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror"value="{{ old('correo') }}"  name="correo" required autocomplete="off" placeholder="duval@dominio.com">
                                @error('correo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="correo" class="text-md-right">CORREO:</label>
                                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror"value="{{ old('correo') }}"  name="correo" required autocomplete="off" placeholder="duval@dominio.com">
                                @error('correo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>


                            <div class="col-md-12 mt-4">
                                <button type="submit" class="w-100 btn btn-sm btn-success">ACTUALIZAR</a>
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


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        REGISTROS
                        <div class="ml-auto"><a class="btn btn-sm btn-primary" href="{{route('employee.create')}}">NUEVO EMPLEADO</a></div>
                    </div>
                </div>
                <div class="card-body">

                    {{-- <div class="row mb-4">
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
                        </div> --}}


                    <!-- Data -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table_cust table-striped table-hover">
                                    <thead class="table-success">
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-left">APELLIDOS</th>
                                            <th class="text-left">NOMBRES</th>
                                            <th class="text-left">CÉDULA</th>
                                            <th class="text-left">CORREO</th>
                                            <th class="text-center">TELÉFONO</th>
                                            <th class="text-center">FECHA NACIMIENTO</th>
                                            <th class="text-center">ESTADO VACUNACIÓN</th>
                                            <th class="text-center">TIPO VACUNA</th>
                                            <th class="text-center">ACCIONES</th>
                                        </tr>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($employees as $item)
                                            <tr>
                                                <td class="text-center">{{$rank++}}</td>
                                                <td class="text-left">{{$item->last_name}}</td>
                                                <td class="text-left">{{$item->first_name}}</td>
                                                <td class="text-left">{{$item->identification}}</td>
                                                <td class="text-left">{{$item->email}}</td>
                                                <td class="text-center">{{$item->phone_number != null ? $item->phone_number : '--'}}</td>
                                                <td class="text-center">{{$item->birth_date != null ? date('d/m/Y' , strtotime($item->birth_date)) : '--'}}</td>
                                                <td class="text-center"><span class="badge {{$item->vaccinated == 1 ? 'bg-success' : 'bg-danger'}}">{{$item->vaccinated == 1 ? 'VACUNADO' : 'NO VACUNADO'}}</span></td>
                                                <td class="text-center">
                                                    @if ($item->vaccinated == 1)
                                                    {{$item->vaccine_name}}
                                                    @else --  @endif
                                                </td>
                                                <td class="text-center"></td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="100">NO SE ENCONTRARÓN REGISTROS</td></tr>
                                        @endforelse --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- @if (session('status'))<div class="alert alert-success" role="alert"> {{ session('status') }}</div> @endif
                    {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content-app')

@endsection
