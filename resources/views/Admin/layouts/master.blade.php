<!doctype html>
<html lang="en" dir="rtl">

<head>
    @include('Admin.layouts.head')
</head>

<body class="app sidebar-mini">

@include('Admin.layouts.switcher')

@include('Admin.layouts.loader')

<div class="page">
    <div class="page-main">
        <!-- ========== Left Sidebar Start ========== -->
        @include('Admin.layouts.main-sidebar')
        <!-- Left Sidebar End -->


        <header>
            @include('Admin.layouts.main-header')
        </header>


        <!-- Start Content here -->
        <div class="app-content">
            <div class="side-app">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">اسم المشروع</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('page_name')</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                @yield('content')
            </div>
        </div>

        @include('Admin.layouts.footer')

    </div>
</div>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
@include('Admin.layouts.footer-scripts')

@yield('js')
</body>
</html>
