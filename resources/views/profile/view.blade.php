@extends('layouts.app')
@section('title-app') PERFIL @endsection
@section('content-app')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">PERFIL</div>
                <div class="card-body">
                    <form action="{{route('user.perfil.edit')}}" method="POST">
                        <input type="hidden" name="employee_id" value="{{$user->id}}">
                        @csrf

                        <div class="row mb-3">
                            @if (Session::has('success'))
                                <div class="col-md-12 mb-2">
                                    <div class="alert alert-success alert-dismissible fade show text-uppercase" role="alert" style="padding:6px">
                                        {{Session::get('success')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding:10px;"></button>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6 form-group mb-2">
                                <label for="identificacion" class="text-md-right">CÉDULA:</label>
                                <input id="identificacion" type="text" class="form-control text-uppercase"  value="{{$user->identification}}" readonly>
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="nombres" class="text-md-right">NOMBRES:</label>
                                <input id="nombres" type="text" class="form-control text-uppercase"  value="{{$user->first_name}}" readonly>
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="apellidos" class="text-md-right">APELLIDOS:</label>
                                <input id="apellidos" type="text" class="form-control text-uppercase"  value="{{$user->last_name}}" readonly>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label for="correo" class="text-md-right">CORREO:</label>
                                <input id="correo" type="text" class="form-control"  value="{{$user->email}}" readonly>
                            </div>

                            <hr>

                            <div class="col-md-6 form-group mb-2">
                                <label for="fecha_nacimiento" class="text-md-right">FECHA NACIMIENTO:</label>
                                <input id="fecha_nacimiento" type="date" class="form-control text-uppercase @error('fecha_nacimiento') is-invalid @enderror"value="{{ old('fecha_nacimiento' , $user->birth_date) }}" name="fecha_nacimiento" required autocomplete="off">
                                @error('correo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="col-md-6 form-group mb-2">
                                <label for="telefono" class="text-md-right">TELÉFONO:</label>
                                <input id="telefono" type="number" class="form-control text-uppercase @error('telefono') is-invalid @enderror"value="{{ old('telefono' , $user->phone_number) }}"  name="telefono" autocomplete="off" required placeholder="0912345678">
                                @error('telefono')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="col-md-12 form-group mb-2">
                                <label for="direccion" class="text-md-right">DIRECCIÓN DE DOMICILIO:</label>
                                <textarea id="direccion" class="form-control text-uppercase @error('direccion') is-invalid @enderror" name="direccion" autocomplete="off" required>{{ old('direccion' , $user->direction) }}</textarea>
                                @error('direccion')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="col-md-6 form-group mb-2">
                                <label for="estado_vacunado" class="text-md-right">ESTADO VACUNACIÓN:</label>
                                <select class="form-select text-uppercase @error('estado_vacunado') is-invalid @enderror" name="estado_vacunado" id="estado_vacunado" required onchange="show_vaccinated(this);">
                                    <option value="" {{ old('estado_vacunado', $user->vaccinated) == null ? 'selected' : '' }}>SELECCIONAR....</option>
                                    <option value="1" {{ old('estado_vacunado', $user->vaccinated) == "1" ? 'selected' : '' }}>VACUNADO</option>
                                    <option value="0" {{ old('estado_vacunado', $user->vaccinated) == "0" ? 'selected' : '' }}>NO VACUNADO</option>
                                </select>
                                @error('estado_vacunado')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="col-md-6 form-group mb-2 show_vaccinated" style="display:{{ old('estado_vacunado', $user->vaccinated) == '1' ? 'block' : 'none' }};">
                                <label for="tipo_vacuna" class="text-md-right">TIPO VACUNA:</label>
                                <select class="form-select text-uppercase @error('tipo_vacuna') is-invalid @enderror" name="tipo_vacuna" id="tipo_vacuna">
                                    <option value="" {{ old('tipo_vacuna' , $user->vaccine_fk) == null ? 'selected' : ''}}>SELECCIONAR....</option>
                                    @foreach ($vaccines as $item)
                                    <option value="{{$item->id}}" {{ old('tipo_vacuna' , $user->vaccine_fk) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('tipo_vacuna')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="col-md-6 form-group mb-2 show_vaccinated" style="display:{{ old('estado_vacunado', $user->vaccinated) == '1' ? 'block' : 'none' }};">
                                <label for="fecha_vacunacion" class="text-md-right">FECHA VACUNACIÓN:</label>
                                <input id="fecha_vacunacion" type="date" class="form-control text-uppercase @error('fecha_vacunacion') is-invalid @enderror" value="{{ old('fecha_vacunacion', $user->vaccinated_date)}}"  name="fecha_vacunacion" autocomplete="off">
                                @error('fecha_vacunacion')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="col-md-6 form-group mb-2 show_vaccinated" style="display:{{ old('estado_vacunado', $user->vaccinated) == '1' ? 'block' : 'none' }};">
                                <label for="dosis" class="text-md-right">NÚMERO DE DOSIS:</label>
                                <input id="dosis" type="number" class="form-control text-uppercase @error('dosis') is-invalid @enderror" value="{{ old('dosis', $user->number_dose)}}" name="dosis" autocomplete="off">
                                @error('dosis')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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


@section('script-app')
    <script>
        function show_vaccinated(this_) {
            const elements = document.getElementsByClassName('show_vaccinated');
            for (let i = 0; i < elements.length; i++) {
                document.getElementsByClassName('show_vaccinated')[i].style.display = "none";
                if(this_.value == "1"){document.getElementsByClassName('show_vaccinated')[i].style.display = "block"; }
            }
        }
    </script>
@endsection
