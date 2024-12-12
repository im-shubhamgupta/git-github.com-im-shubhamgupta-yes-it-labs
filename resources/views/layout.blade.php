<!DOCTYPE html>
<html lang="english">

<head>
    <meta charset="utf-8" />
    <title>@yield('page_title') | Dashboard V1</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content name="description" />
    <meta content name="author" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom_css.css') }}" rel="stylesheet" />
    {{-- https://www.bootdey.com/snippets/view/new-customer-list --}}
    <style>
        body {
            background: rgb(131, 58, 180);
            background: linear-gradient(90deg, rgba(131, 58, 180, 1) 0%, rgba(245, 46, 46, 1) 78%, rgba(252, 176, 69, 1) 100%);
        }
        .container {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="section__content section__content--p30">
                @section('container')
                @show
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
