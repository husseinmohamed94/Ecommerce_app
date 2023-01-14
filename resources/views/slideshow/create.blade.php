@extends('layouts.master')
@section('title')
    Users
@endsection


@section('content')
<div class="container ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"> </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{trans('users_trans.Name')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- pageheader -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end pageheader -->





        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">

                <form action="{{route('slide.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="exampleInputTilte"> image</label>
                                <input type="file" class="form-control" name="image" value="{{old('image')}}" id="exampleInputTilte"  >
                            </div>


                        <div class="form-group col-md-12">
                            <label for="exampleInputTilte"> Title</label>
                            <input type="text" class="form-control"  name="title" value="{{old('title')}}" id="exampleInputTilte"  placeholder="Enter title">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputTilte"> boody</label>
                            <input type="text" class="form-control" name="boody" value="{{old('boody')}}" id="exampleInputTilte"  placeholder="Enter boody">
                        </div>

                        <div class="form-group col-md-12 text-center">
                            <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">save</button>                </form>

                        </div>
                    </div>

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>

    </div>



</div>
@endsection
@section('script')




@endsection
