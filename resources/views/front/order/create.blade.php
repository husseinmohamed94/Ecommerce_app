
@extends('layouts.master-fornt')
@section('title')
    ECOMMERCE
@endsection
@section('css')

@endsection
@section('content')
  {{--
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"></h2>
                <p class="pageheader-text"></p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item " aria-current="page"><a href="/" class="breadcrumb-link"> <i class="fa fa-home"></i></a></li>


                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link"> 1</a></li>
                            <li class="breadcrumb-item active" aria-current="page">2</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <div class="container">
        <!-- basic form  -->
        <!-- ============================================================== -->


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section-block" id="basicform">
                    <h3 class="section-title">Basic Form Elements</h3>
                    <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
                </div>
                <div class="card">
                    <h5 class="card-header">Basic Form</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Input Text</label>
                                <input id="inputText3" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email address</label>
                                <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control">
                                <p>We'll never share your email with anyone else.</p>
                            </div>
                            <div class="form-group">
                                <label for="inputText4" class="col-form-label">Number Input</label>
                                <input id="inputText4" type="number" class="form-control" placeholder="Numbers">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input id="inputPassword" type="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">File Input</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="card-body border-top">
                        <h3>Sizing</h3>
                        <form>
                            <div class="form-group">
                                <label for="inputSmall" class="col-form-label">Small</label>
                                <input id="inputSmall" type="text" value=".form-control-sm" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="inputDefault" class="col-form-label">Default</label>
                                <input id="inputDefault" type="text" value="Default input" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputLarge" class="col-form-label">Large</label>
                                <input id="inputLarge" type="text" value=".form-control-lg" class="form-control form-control-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->
        <div class="mb-4 px-4 leading-normal text-blue-700 bg-primary  rounded-lg" >

            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                </thead>

                <tbody>

                <?php foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row) :?>

                <tr>
                    <td>{{ $row->name;  }}  </td>

                    <td><input type="number" value="<?php echo $row->qty; ?>"   style="width:50px;"></td>
                    <td>$<?php echo $row->price; ?></td>
                    <td>$<?php echo $row->total; ?></td>
                </tr>

                <?php endforeach;?>

                </tbody>

                <tfoot>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Subtotal</td>
                    <td><?php echo \Gloudemans\Shoppingcart\Facades\Cart::subtotal(); ?></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Tax</td>
                    <td><?php echo Cart::tax(); ?></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td><?php echo Cart::total(); ?></td>
                </tr>


                </tfoot>
            </table>

        </div>



    </div>
    <!-- end container  -->

  --}}

  @livewire('order')
@endsection
@section('js')


@endsection
