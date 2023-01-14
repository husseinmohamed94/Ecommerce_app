@extends('layouts.master')
@section('title')
    {{trans('Mune_trans.Product')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{trans('product_trans.product')}}</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{trans('Mune_trans.Product')}}</a></li>
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






        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">

                <h5 class="card-header" >{{trans('product_trans.product')}}
                <a href="{{route('Product.create')}}"  class="btn btn-primary btn-lg ">{{trans('product_trans.ِadd')}} </a>
                </h5>
                </button>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  id="datatable" class="table table-striped table-bordered first"   data-page-length="50">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('product_trans.imag')}}</th>
                                <th>{{trans('product_trans.Name')}}</th>
                                <th>{{trans('product_trans.dailas')}}</th>
                                <th>{{trans('product_trans.price')}}</th>
                                <th>{{trans('product_trans.Category')}}</th>
                                <th>{{trans('product_trans.subCategory')}}</th>
                                <th>{{trans('product_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =0; ?>
                            @foreach($Products as $product )
                                <?php $i++; ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><img src="/{{ $product->image}}" width="50px" height="50px"></td>
                                    <td >{{$product->Name}}</td>
                                    <td> {{$product->details}}</td>
                                    <td> {{$product->price}}</td>
                                    <td> {{$product->Categorys->Name}}</td>
                                    <td> {{$product->SubCategorys->Name}}</td>

                                    <td>
                                        <a href="{{route('Product.edit',$product->id)}}" title="{{trans('product_trans.title_a')}}" class="btn x-small btn-primary" ><i class="fas fa-edit"></i></a>
                                        <a href="#" title="حذف" class="btn x-small btn-danger" data-toggle="modal" data-target="#categorydeelet{{$product->id}}"><i class="fas fa-trash"></i></a>

                                    </td>
                                </tr>

                            </tbody>


                            <!-- modal Delete  -->
                            <div class="modal fade" id="categorydeelet{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POst" action="{{route('Product.destroy',$product->id)}}">
                                                @csrf
                                                @method('DELETE')

                                                <div class="form-group">
                                                    <input type="hidden" value="{{$product->image}}" name="oldimage">

                                                    <h3 for="exampleInputEmail1"> {{$product->Name}} هل انت متاكد من الحذف ؟ </h3>

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
                        {{$Products->links()}}
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
