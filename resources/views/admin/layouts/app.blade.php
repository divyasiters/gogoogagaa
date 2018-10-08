<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{  $pageTitle }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @yield('styles')
</head>

<body class="@guest bg-dark @endguest">
    <div class="@guest container @endguest">
    @auth
        @include('admin.includes.left-menu')
        @include('admin.includes.header')
    @endauth
        @yield('content')
    </div>
@yield('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
