@extends('layouts.app')
@section('title-app') LISTA DE EMPLEADOS @endsection
@section('content-app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex">
                        REGISTROS
                        <div class="ml-auto"><a class="btn btn-sm btn-primary" href="{{route('employee.create')}}">NUEVO EMPLEADO</a></div>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Filters -->
                    <form action="" method="get">
                    <div class="row mb-4">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label>ESTADO VACUNA:</label>
                                <select class="form-select text-uppercase" id="search_status_vaccinated" name="search_status_vaccinated" >
                                    <option value="" {{$search_status_vaccinated == null ? 'selected' : ''}}>SELECCIONAR....</option>
                                    <option value="true" {{$search_status_vaccinated == "true" ? 'selected' : ''}}>VACUNADO</option>
                                    <option value="false" {{$search_status_vaccinated == "false" ? 'selected' : ''}}>NO VACUNADO</option>
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
                                <label>FECHA DE VACUNACIÓN:</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control text-uppercase" name="search_date_start" value="{{$search_date_start != null ? date('Y-m-d' , strtotime($search_date_start)) : null}}">
                                    <span class="input-group-text">-</span>
                                    <input type="date" class="form-control text-uppercase" name="search_date_end" value="{{$search_date_end != null ? date('Y-m-d' , strtotime($search_date_end)) : null}}">
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-12">
                                <label style="color:transparent;">btn</label>
                                <div><button type="submit" class="w-100 btn btn-sm btn-success">BUSCAR REGISTROS</button></div>
                            </div>
                        </div>
                    </form>

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding:6px">
                            {{Session::get('success')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding:10px;"></button>
                        </div>
                    @endif

                    <!-- Data -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table_cust table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-left">APELLIDOS Y NOMBRES</th>
                                            <th class="text-left">CÉDULA</th>
                                            <th class="text-left">CORREO</th>
                                            <th class="text-center">TELÉFONO</th>
                                            <th class="text-center">FECHA NACIMIENTO</th>
                                            <th class="text-center">ESTADO VACUNACIÓN</th>
                                            <th class="text-left">DATOS VACUNA</th>
                                            <th class="text-left">ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employees as $item)
                                            <tr>
                                                <td class="text-center">{{$rank++}}</td>
                                                <td class="text-left">{{$item->last_name}} <br> {{$item->first_name}}</td>
                                                <td class="text-left">{{$item->identification}}</td>
                                                <td class="text-left">{{$item->email}}</td>
                                                <td class="text-center">{{$item->phone_number != null ? $item->phone_number : '--'}}</td>
                                                <td class="text-center">{{$item->birth_date != null ? date('d/m/Y' , strtotime($item->birth_date)) : '--'}}</td>
                                                <td class="text-center"><span class="badge {{$item->vaccinated == 1 ? 'bg-success' : 'bg-danger'}}">{{$item->vaccinated == 1 ? 'VACUNADO' : 'NO VACUNADO'}}</span></td>
                                                <td class="text-left text-uppercase">
                                                    @if ($item->vaccinated == 1)
                                                    <div>{{$item->vaccine_name}}</div>
                                                    <div># DOSIS: {{$item->number_dose}}</div>
                                                    <div>FECHA: {{ date('d/m/Y' , strtotime($item->vaccinated_date))}}</div>

                                                    @else --  @endif
                                                </td>
                                                <td class="text-left">
                                                    <div>
                                                        <a href="{{ route('employee.edit', ['id'=>$item->id]) }}">EDITAR</a>
                                                    </div>
                                                    <a href="{{ route('employee.delete', ['id'=>$item->id]) }}" class="text-danger">ELIMINAR</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="100">NO SE ENCONTRARÓN REGISTROS</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-left">
                                {!! $employees->withQueryString()->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content-app')

@endsection
