{{--@extends('Admin.layouts.master')--}}
@section('title')
    تسجيل الدخول
    @stop


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login 2 | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link href="{{URL::asset('assets/images/favicon.ico')}}" rel="shortcut icon">

    <!-- owl.carousel css -->
    <link href="{{URL::asset('assets/libs/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet"">

    <link href="{{URL::asset('assets/libs/owl.carousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Toastr Css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body class="auth-body-bg">

<div>
    <div class="container-fluid p-0">
        <div class="row g-0">

            <div class="col-xl-9">
                <div class="auth-full-bg pt-lg-5 p-4">
                    <div class="w-100">
                        <div class="bg-overlay"></div>
                        <div class="d-flex h-100 flex-column">

                            <div class="p-4 mt-auto">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5">
                                <a href="index.html" class="d-block auth-logo">
                                    <img src="{{URL::asset('assets/images/logo-dark.png')}}" alt="" height="18" class="auth-logo-dark">
{{--                                    <img src="assets/images/logo-dark.png" alt="" height="18" class="auth-logo-dark">--}}
                                    <img src="{{URL::asset('assets/images/logo-light.png')}}" alt="" height="18" class="auth-logo-light">

{{--                                    <img src="assets/images/logo-light.png" alt="" height="18" class="auth-logo-light">--}}
                                </a>
                            </div>
                            <div class="my-auto">

{{--                                <div class="card-body">--}}

{{--                                    @if ($message = Session::get('success'))--}}
{{--                                        <div class="alert alert-success">--}}
{{--                                            <p>{{ $message }}</p>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                    @if ($errors->any())--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

                                <div>
                                    <h5 class="heading-primary" style="font-size: 30px" >مرحبا بك</h5>
                                    <br>
                                    <br>
                                    <h5 class="text-primary" style="font-size: 40px" >تسجيل الدخول</h5>
                                </div>

                                <div class="mt-4">
                                    <form id="LoginForm" class="login" method="POST" action="{{ route('admin.LoginPage') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="username" name="email" placeholder="البريد الالكتروني">
                                        </div>

                                        <div class="mb-3">
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password" placeholder="كلمة المرور" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button id="loginBtn" class="btn btn-primary waves-effect waves-light" type="submit">تسجيل الدخول</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

<!-- JAVASCRIPT -->
<script src="{{URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/auth-2-carousel.init.js') }}"></script>

    <script>
        $(document).on('submit', 'Form#LoginForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#LoginForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#loginBtn').html('<span style="margin-right: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>');
                },
                success: function (data) {
                    if (data.status == 200) {
                        // show custom message or use the default
                        toastr.success((data.message) ?? 'مرحبا بك');
                        // Reload the page after a delay
                        setTimeout(function() {
                            window.location.href = 'admins';
                        }, 2000); // Delay for 2 seconds before reloading
                    } else
                        toastr.error('البيانات خاطئة');
                    $('#loginBtn').html('تسجيل الدخول').attr('disabled', false);
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
                                });
                            }
                        });
                    } else
                        toastr.error('عذرا هناك خطأ فني 😞');
                    $('#loginBtn').html('تسجيل الدخول').attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>

</body>
</html>



