<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Data Transport</title>

    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/multilevel-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <style>
        .container {       
            max-width: 100% !important;
        }

        #yfDashContainer16af29b4-9ee6-4e72-84fd-a5d38c793e89 {       
            margin-right: 1% !important;
        }
    </style>
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.navbar')
            <div class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <h1 class="title-4">
                                    Dashboard Angkot Bandung
                                </h1>
                            </center>
                            <hr class="line-seprate">
                            <center>
                                <script type="text/javascript" src="http://103.56.149.64:8080/JsAPI?dashUUID=16af29b4-9ee6-4e72-84fd-a5d38c793e89&width=auto&showTitle=false"></script>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>