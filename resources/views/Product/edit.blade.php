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

                    <form action="{{route('Product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <input type="hidden"  name="oldimage" value="{{ $product->image}}">

                            <div class="form-group col-md-6">
                                <label for="exampleInputTilte"> Name</label>
                                <input type="text" class="form-control"  name="Name_ar" value="{{$product->getTranslation('Name','ar')}}" id="exampleInputTilte"  placeholder="Enter title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTilte"> Name En</label>
                                <input type="text" class="form-control"  name="Name_en" value="{{$product->getTranslation('Name','en')}}" id="exampleInputTilte"  placeholder="Enter title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTilte"> details</label>
                                <textarea type="text" class="form-control" name="details_ar"  id="exampleInputTilte"  placeholder="Enter details ar">{{$product->getTranslation('details','ar')}}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTilte"> details</label>
                                <textarea type="text" class="form-control"  name="details_en"  id="exampleInputTilte"  placeholder="Enter details en">{{$product->getTranslation('details','en')}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputTilte"> price</label>
                                <input type="number" class="form-control" name="price" value="{{$product->price}}" id="exampleInputTilte"  placeholder="Enter boody">
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="catogry_id">
                                    <option value="{{$product->Categorys->id}}">{{$product->Categorys->Name}}</option>
                                    @foreach($Catogrys as $Catogry)
                                        <option value="{{$Catogry->id}}">{{$Catogry->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="sub_catogry">
                                    <option value="{{$product->SubCategorys->id}}">{{$product->SubCategorys->Name}}</option>


                                </select>
                            </div>
                            <img src="/{{ $product->image}}"  width="150px" height="150px">

                            <div class="form-group col-md-12">
                                <label for="exampleInputTilte"> image</label>
                                <input type="file" class="form-control" name="image"  >
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
