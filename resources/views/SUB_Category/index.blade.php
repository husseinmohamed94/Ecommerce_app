@extends('layouts.master')
@section('title')
    hussein
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{trans('category_trans.ِcategory')}}</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{trans('category_trans.ِcategory')}}</a></li>
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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">{{trans('category_trans.ِcategory')}}</h5>
                <button type="button" class="btn x-small btn-primary" data-toggle="modal" data-target="#exampleModal">
                    {{trans('category_trans.ِadd_category')}}

                </button>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('category_trans.Name')}}</th>
                                <th>{{trans('category_trans.Note')}}</th>
                                <th>{{trans('category_trans.ِcategory')}}</th>
                                <th>{{trans('category_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =0; ?>
                            @foreach($subCategorys as $subCategory )
                                <?php $i++; ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td> {{$subCategory->Name}}</td>
                                    <td>{{$subCategory->Note}}</td>
                                    <td>{{$subCategory->category->Name}}</td>

                                    <td>
                                        <a href="#" title="{{trans('category_trans.title_a')}}" class="btn x-small btn-primary" data-toggle="modal" data-target="#categoryEdit{{$subCategory->id}}"><i class="fas fa-edit"></i></a>
                                        <a href="#" title="{{trans('category_trans.title_delet')}}" class="btn x-small btn-danger" data-toggle="modal" data-target="#categorydelete{{$subCategory->id}}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>

                            <div class="modal fade" id="categoryEdit{{$subCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POst" action="{{route('SubCategory.update',$subCategory->id)}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{$subCategory->id}}" class="form-control" name="id" >

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name </label>
                                                    <input type="text" value="{{$subCategory->getTranslation('Name','ar')}}" class="form-control" name="Name_ar" id="exampleInputEmail1" = placeholder="Enter Name">
                                                    @error('Name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name_en </label>
                                                    <input type="text" class="form-control" value="{{$subCategory->getTranslation('Name','en')}}" name="Name_en" id="exampleInputEmail1" = placeholder="Enter Name">
                                                    @error('Name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Note</label>
                                                    <input type="text" name="Note_ar" value="{{$subCategory->getTranslation('Note','ar')}}" class="form-control" id="exampleInputPassword1" placeholder="Note_ar">
                                                    @error('Note_ar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Note_en</label>
                                                    <input type="text" name="Note_en" value="{{$subCategory->getTranslation('Note','en')}}" class="form-control" id="exampleInputPassword1" placeholder="Note">
                                                    @error('Note_en')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">{{trans('category_trans.ِcategory')}}</label><br>
                                                    <select class="form-select form-control form-select-lg " name="category_id"  aria-label=" select example">
                                                        <option   value=" {{$subCategory->category->id}}" selected >{{$subCategory->category->Name}}</option>
                                                        @foreach($Categiers as $Categier)
                                                            <option class="form-control"    value="{{$Categier->id}}">{{$Categier->Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submitz" class="btn btn-primary">Save changes</button>
                                        </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                            @include('SUB_Category.deleteCatogray')
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POst" action="{{route('SubCategory.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name </label>
                            <input type="text" class="form-control" name="Name_ar" id="exampleInputEmail1" = placeholder="Enter Name">
                            @error('Name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name_en </label>
                            <input type="text" class="form-control" name="Name_en" id="exampleInputEmail1" = placeholder="Enter Name">
                            @error('Name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Note</label>
                            <input type="text" name="Note_ar" class="form-control" id="exampleInputPassword1" placeholder="Note_ar">
                            @error('Note_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Note_en</label>
                            <input type="text" name="Note_en" class="form-control" id="exampleInputPassword1" placeholder="Note">
                            @error('Note_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{trans('category_trans.ِcategory')}}</label><br>
                            <select class="form-select form-select-lg " name="category_id"  aria-label=" select example">
                                <option  selected>Open this select menu</option>
                                @foreach($Categiers as $Categier)
                                <option class="form-control"    value="{{$Categier->id}}">{{$Categier->Name}}</option>
                                @endforeach
                            </select>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submitz" class="btn btn-primary">Save changes</button>
                </div>

                </form>

            </div>
        </div>
    </div>


</div>
@endsection
@section('script')


    <script>
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_category') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="category_id"]').empty();
                            $('select[name="category_id"]').append('<option selected disabled >{{trans('category_trans.ِcategory')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="category_id"]').append('<option value="' + key + '">' + value + '</option>');
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
