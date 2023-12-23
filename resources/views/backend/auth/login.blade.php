<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - {{ Helper::getSettings('application_name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('assets/css/backend/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('uploads/settings/'.Helper::getSettings('site_favicon')) }}" rel="icon">
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <div class="row content_middle">
                <div class="col-lg-4 layoutAuthentication_content-wrapper">
                    <div class="text-center">
                        <img class="logo-admin" src="{{ Helper::getSettings('site_logo') ? asset('uploads/settings/'.Helper::getSettings('site_logo')) : asset('assets/img/Logo.png')}}" alt="">
                    </div>
                    <div class="border-0 rounded-lg">
                        <h3 class="text-center my-4">Login</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <p class="m-0">{{ Session::get('message') }}</p>
                            </div> 
                        @endif
                        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="email" name="email"
                                    placeholder="name@example.com" required />
                                <label for="inputEmail">Email<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPassword" name="password" type="password"
                                    placeholder="{{ trans('language.label_password') }}" required />
                                <label for="inputPassword">Password<span class="text-danger">*</span></label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/backend/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e596160a4.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/backend/scripts.js') }}"></script>
</body>

</html>
