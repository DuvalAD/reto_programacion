@extends('layouts.app')

@section('content-app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert"> {{ session('status') }}</div>
                    @endif --}}
                    <div>
                        BIENVENIDO/A ESTIMADO/A <span class="text-uppercase">{{Auth::user()->rol}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
