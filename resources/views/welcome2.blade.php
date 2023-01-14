@extends('layouts.master-fornt')
@section('title')
  ECOMMERCE
@endsection
@section('css')

    @endsection

@section('content')
<div class="container">
    <div class="row p-4">
       <div class="col-12">
           <!-- strat carousel  -->
           <!-- ============================================================== -->
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
           <!-- ============================================================== -->
           <!-- end carousel   -->
           <!-- ============================================================== -->


       </div>

        <!-- end col  -->
    </div>
    <!-- end row  -->


    <!-- strat proudct first -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">


            <div class="row p-5">
                @foreach($products as $product)

                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 product_data">
                        <div class="product-thumbnail">

                            <div class="product-img-head">
                                <div class="product-img">
                                    <img src="/{{ $product->image}}" alt="" class="img-fluid"></div>
                                <div class="ribbons"></div>
                                <div class="ribbons-text">{{$product->SubCategorys->Name}}</div>
                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title">{{$product->Name}}</h3>
                                    <div class="product-rating d-inline-block">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="product-price">$ {{ $product->price}}

                                    </div>
                                </div>
                                <div class="product-btn">

                                    <input type="hidden" value="{{$product->id}}"  class="product_id"  >
                                    <input type="hidden" value="1" class="qtyinput"  >
                                    <a href="" class="btn btn-primary addToCartBtn">Add to Cart</a>
                                    <a href="{{route('Visitor.show',$product->id)}}" class="btn btn-outline-primary">Details</a>
                                    <a href="#" class="btn btn-outline-primary"><i class="fas fa-exchange-alt"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </div>

    <!-- end proudct  -->
    <!-- ============================================================== -->


    <!--  اعلانات  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="p-3">
                <div class="text-center  bg-primary"> اعلانات</div>
            </div>

        </div>
    </div>
    <!--  اعلانات  -->
    <!-- ============================================================== -->


    <!-- strat proudct 2 -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="row p-5">
                @foreach($products2 as $product)

                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 product_data">
                        <div class="product-thumbnail">

                            <div class="product-img-head">
                                <div class="product-img">
                                    <img src="/{{ $product->image}}" alt="" class="img-fluid"></div>
                                <div class="ribbons"></div>
                                <div class="ribbons-text">{{$product->SubCategorys->Name}}</div>
                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title">{{$product->Name}}</h3>
                                    <div class="product-rating d-inline-block">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="product-price">$ {{ $product->price}}

                                    </div>
                                </div>
                                <div class="product-btn">

                                    <form action="{{route('Cart.store')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}"  name="product_id" class="product_id" >
                                        <input type="hidden" value="1" name="qtyinput" class="qtyinput"  >
                                        <button type="submit" href="#" class="btn btn-primary addToCartBtn">Add to Cart</button>
                                    </form>

                                    <a href="{{route('Visitor.show',$product->id)}}" class="btn btn-outline-primary">Details</a>
                                    <a href="#" class="btn btn-outline-primary"><i class="fas fa-exchange-alt"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- end proudct  -->
    <!-- ============================================================== -->

    <!--  اعلانات  -->
    <!-- ============================================================== -->
     <div class="row">
         <div class="col-12">

             <div class="p-3">
                 <div class="text-center  bg-primary"> اعلانات</div>
             </div>

         </div>
     </div>
    <!--  اعلانات  -->
    <!-- ============================================================== -->
    <!-- strat proudct 3 -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="row p-5">
                @foreach($products3 as $product)

                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 product_data">
                        <div class="product-thumbnail">

                            <div class="product-img-head">
                                <div class="product-img">
                                    <img src="/{{ $product->image}}" alt="" class="img-fluid"></div>
                                <div class="ribbons"></div>
                                <div class="ribbons-text">{{$product->SubCategorys->Name}}</div>
                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title">{{$product->Name}}</h3>
                                    <div class="product-rating d-inline-block">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="product-price">$ {{ $product->price}}

                                    </div>
                                </div>
                                <div class="product-btn">
                                    <input type="hidden" value="{{$product->id}}"  class="product_id"  >
                                    <input type="hidden" value="1" class="qtyinput"  >
                                    <a href="#" class="btn btn-primary addToCartBtn">Add to Cart</a>
                                    <a href="{{route('Visitor.show',$product->id)}}" class="btn btn-outline-primary">Details</a>
                                    <a href="#" class="btn btn-outline-primary"><i class="fas fa-exchange-alt"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- end proudct  -->
    <!-- ============================================================== -->
    <!--  اعلانات  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="p-3">
                <div class="text-center  bg-primary"> اعلانات</div>
            </div>

        </div>
    </div>
    <!--  اعلانات  -->

    <!-- strat proudct 4 -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="row p-5">
                @foreach($products4 as $product)

                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 product_data">
                        <div class="product-thumbnail">

                            <div class="product-img-head">
                                <div class="product-img">
                                    <img src="/{{ $product->image}}" alt="" class="img-fluid"></div>
                                <div class="ribbons"></div>
                                <div class="ribbons-text">{{$product->SubCategorys->Name}}</div>
                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title">{{$product->Name}}</h3>
                                    <div class="product-rating d-inline-block">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="product-price">$ {{ $product->price}}

                                    </div>
                                </div>
                                <div class="product-btn">
                                    <input type="hidden" value="{{$product->id}}"  class="product_id"  >
                                    <input type="hidden" value="1" class="qtyinput"  >
                                    <a href="#" class="btn btn-primary addToCartBtn">Add to Cart</a>
                                    <a href="{{route('Visitor.show',$product->id)}}" class="btn btn-outline-primary">Details</a>
                                    <a href="#" class="btn btn-outline-primary"><i class="fas fa-exchange-alt"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- end proudct  -->
    <!-- ============================================================== -->
    <!--  اعلانات  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="p-3">
                <div class="text-center  bg-primary"> اعلانات</div>
            </div>

        </div>
    </div>
    <!--  اعلانات  -->

    <!-- strat proudct 5 -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="row p-5">
                @foreach($products5 as $product)

                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 product_data">
                        <div class="product-thumbnail">

                            <div class="product-img-head">
                                <div class="product-img">
                                    <img src="/{{ $product->image}}" alt="" class="img-fluid"></div>
                                <div class="ribbons"></div>
                                <div class="ribbons-text">{{$product->SubCategorys->Name}}</div>
                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title">{{$product->Name}}</h3>
                                    <div class="product-rating d-inline-block">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="product-price">$ {{ $product->price}}

                                    </div>
                                </div>
                                <div class="product-btn">
                                    <input type="hidden" value="{{$product->id}}"  class="product_id"  >
                                    <input type="hidden" value="1" class="qtyinput"  >
                                    <a href="#" class="btn btn-primary addToCartBtn">Add to Cart</a>
                                    <a href="{{route('Visitor.show',$product->id)}}" class="btn btn-outline-primary">Details</a>
                                    <a href="#" class="btn btn-outline-primary"><i class="fas fa-exchange-alt"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- end proudct  -->
    <!-- ============================================================== -->

</div>
<!-- end container  -->



@endsection

@section('js')

<script type="text/javascript">
/*
    $(document).ready(function (){
        $('.addToCartBtn').click(function (e){
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var qtyinput = $(this).closest('.product_data').find('.qtyinput').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type:"Post",
             url: "/add-to-cart",
             data: {
                'product_id' : product_id,
                 'qtyinput'  : qtyinput,
             },

             success: function (response){
             //   alert(response.status);

             }

            });
        });
    });
    */
</script>

@endsection
