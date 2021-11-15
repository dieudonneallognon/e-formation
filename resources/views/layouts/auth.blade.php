@extends('layouts.base')

@section('body')
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                @yield('form')
            </div>
        </div>
    </div>
@endsection
