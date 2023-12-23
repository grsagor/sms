<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @hasSection('title') @yield('title') @else  Dashboard | {{ Helper::getSettings('application_name') }} @endif </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="{{ asset('assets/css/backend/styles.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
        <link href="{{ asset('assets/css/backend/toastr.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/backend/jquery.dataTables.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/js/backend/sweetalert2.js') }}" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/summernote.min.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


        <link rel="shortcut icon" href="{{ asset('uploads/settings/'.Helper::getSettings('site_favicon')) }}" />

        @yield('css')

    </head>
