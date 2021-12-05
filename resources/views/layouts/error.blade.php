<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->

    <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/themes/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/plugins/toolbar/prism-toolbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dist/dropzone.css') }}" >
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <title>{{ $exception->getMessage() }}</title>
</head>

<body>
<!-- Error page -->
<div class="container min-vh-100 d-flex justify-content-center
      align-items-center">
    <!-- row -->
    @yield('content')
</div>
<!-- Scripts -->
<!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/libs/feather-icons/dist/feather.min.js"></script>
<script src="../assets/libs/prismjs/components/prism-core.min.js"></script>
<script src="../assets/libs/prismjs/components/prism-markup.min.js"></script>
<script src="../assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>


<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>



<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
</body>

</html>
