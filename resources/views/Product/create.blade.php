@extends('layouts.master')
@section('title')
    {{trans('Mune_trans.Product')}}
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
                            <li class="breadcrumb-item"><a href="{{route('Product.index')}}" class="breadcrumb-link">{{trans('Mune_trans.Product')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">





        <!-- basic form  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">

                <form action="{{route('Product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> Name</label>
                            <input type="text" class="form-control"  name="Name_ar" value="{{old('Name_ar')}}" id="exampleInputTilte"  placeholder="Enter title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> Name En</label>
                            <input type="text" class="form-control"  name="Name_en" value="{{old('Name_en')}}" id="exampleInputTilte"  placeholder="Enter title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> details</label>
                            <textarea type="text" class="form-control" name="details_ar" value="{{old('details_ar')}}" id="exampleInputTilte"  placeholder="Enter boody"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> details</label>
                            <textarea type="text" class="form-control"  name="details_en" value="{{old('details_en')}}" id="exampleInputTilte"  placeholder="Enter title"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputTilte"> price</label>
                            <input type="number" class="form-control" name="price" value="{{old('price')}}" id="exampleInputTilte"  placeholder="Enter boody">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> qnt</label>
                            <input type="number" class="form-control" name="qty" value="{{old('qnt')}}" id="exampleInputTilte"  placeholder="Enter boody">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> status</label>
                            <select class="form-control" name="status">
                                <option value="1">متوفر</option>
                                <option value="2">متوفر غير</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> القسم الرئسي</label>
                        <select class="form-control" name="catogry_id">
                            <option value="اختار القسم">اختار القسم</option>
                            @foreach($Catogrys as $Catogry)
                                <option value="{{$Catogry->id}}">{{$Catogry->Name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputTilte"> الفسم الفرعي</label>
                        <select class="form-control" name="sub_catogry">


                        </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputTilte"> image</label>
                            <input type="file" class="form-control" name="image" value="{{old('image')}}" id="exampleInputTilte"  >
                        </div>

                        <div class="form-group col-md-12 text-center">
                            <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">save</button>
                        </div>
                </form>

                        </div>
                    </div>



        </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->
        <!-- ============================================================== -->
    </div>

    </div>



</div>

@endsection
@section('script')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="catogry_id"]').on('change', function () {
                var catogry_id = $(this).val();
                if (catogry_id) {
                    $.ajax({
                        url: "{{ URL::to('get_subcatogry') }}/" + catogry_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="sub_catogry"]').empty();
                            $('select[name="sub_catogry"]').append('<option selected disabled >اختار...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="sub_catogry"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


@endsection
