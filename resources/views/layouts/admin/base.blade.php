@extends('layouts.base')

@section('body')
    <div id="db-wrapper">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- Page content -->
        <div id="page-content">

            <!-- navbar -->
            @include('layouts.admin.navbar')

            <!-- Container fluid -->
            @yield('container')
        </div>
    </div>
@endsection

@section('scripts')
    @auth
        <script>
            document.getElementById('logout-link').addEventListener('click', (event) => {
                document.querySelector('form#logout').submit();
            });
        </script>
    @endauth
    <script src="{{ asset('assets/js/admin.js') }}"></script>
@endsection
