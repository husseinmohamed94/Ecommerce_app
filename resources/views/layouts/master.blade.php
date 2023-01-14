<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layouts.head')
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->

    <!-- navbar -->
@include('layouts.main-header')
<!-- end navbar -->


    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
@include('layouts.main-sidebar')
<!-- end left sidebar -->

    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">



                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    <!-- ============================================================== -->
                 @yield('content')

            </div>
<!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

@include('layouts.footer')
<!-- ============================================================== -->
    <!-- end footer -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
</div>
<!-- ============================================================== -->


@include('layouts.footer-scripts')
</body>

</html>
