@extends('layouts.master')
@section('title')
    Users
@endsection
@section('css')
   <style>
       .inf-content{
           border:1px solid #DDDDDD;
           -webkit-border-radius:10px;
           -moz-border-radius:10px;
           border-radius:10px;
           box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
       }
   </style>
@endsection

@section('content')
<div class="container  bootstrap snippets bootdey">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"> {{ $user->name }}</h2>
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
        <div class="panel-body inf-content">
            <div class="row">
                <div class="col-md-4">
                    <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario">
                    <ul title="Ratings" class="list-inline ratings text-center">
                        <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <strong>Information</strong><br>
                    <div class="table-responsive">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Identificacion
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    123456789
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-user  text-primary"></span>
                                        Name
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-cloud text-primary"></span>
                                        Lastname
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->name }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                        Username
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->name }}
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                        Role
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->admin() }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-envelope text-primary"></span>
                                        Email
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->email }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-calendar text-primary"></span>
                                        created
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->created_at }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-calendar text-primary"></span>
                                        Modified
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->updated_at }}
                                </td>
                            </tr>
                            </tbody>
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
