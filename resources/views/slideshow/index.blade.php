@extends('layouts.master')
@section('title')
    slide show
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{trans('users_trans.Name')}}</h2>
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
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
               @foreach( $slides  as $key => $slide)
                    <div class="carousel-item {{ $key == 0 ? ' active' : '' }} ">
                        <img class="d-block w-100" src="/{{$slide->image}}"  alt="{{$slide->title}}">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="text-dark bg-primary">{{$slide->title}}</h2>
                            <p  class=" text-dark bg-primary">{{$slide->boody}}</p>
                        </div>

                    </div>

                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>






        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">

                <h5 class="card-header">{{trans('users_trans.User')}}
                <a href="{{route('slide.create')}}"  class="btn btn-primary btn-lg ">اضافة صوره</a>
</h5>
                </button>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('users_trans.imag')}}</th>
                                <th>{{trans('users_trans.title')}}</th>
                                <th>{{trans('users_trans.boody')}}</th>
                                <th>{{trans('users_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =0; ?>
                            @foreach($slides as $slide )
                                <?php $i++; ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><img src="/{{ $slide->image}}" width="200px" height="200px"></td>
                                    <td >{{$slide->title}}</td>
                                    <td> {{$slide->boody}}</td>

                                    <td>
                                        <a href="{{route('slide.edit',$slide->id)}}" title="{{trans('users_trans.title_a')}}" class="btn x-small btn-primary" ><i class="fas fa-edit"></i></a>
                                        <a href="#" title="حذف" class="btn x-small btn-danger" data-toggle="modal" data-target="#categorydeelet{{$slide->id}}"><i class="fas fa-trash">حذف</i></a>

                                    </td>
                                </tr>

                            </tbody>


                            <!-- modal Delete  -->
                            <div class="modal fade" id="categorydeelet{{$slide->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POst" action="{{route('slide.destroy',$slide->id)}}">
                                                @csrf
                                                @method('DELETE')

                                                <div class="form-group">
                                                    <input type="hidden" value="{{$slide->image}}" name="oldimage">

                                                    <h3 for="exampleInputEmail1"> {{$slide->title}} هل انت متاكد من الحذف ؟ </h3>

                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                                            <button type="submit" class="btn btn-primary"> نعم</button>
                                        </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- end modal Delete  -->




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



</div>
@endsection
@section('script')




@endsection
