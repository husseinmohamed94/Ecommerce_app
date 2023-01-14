<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/cssF/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cssF/style.css')}}">
    <title>@yield('title')</title>
    @yield('css')
    @include('layouts.head')
    @livewireStyles
</head>
<body>
    <!-- navbar -->
    <div class="p-1">
        <div class="container">
            <div class="row">
                <div class="col-12" ">
                <ul class="nav justify-content-end">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                        @guest
                        @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('sign in') }}</a>
                    </li>
                        @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info">
                                        <h5 class="mb-0 text-white nav-user-name">{{auth()->user()->email}} </h5>
                                        <span class="status"></span><span class="ml-2">{{auth()->user()->name}}</span>
                                    </div>
                                    <a class="dropdown-item" href="{{route('Users.show',auth()->user()->id)}}"><i class="fas fa-user mr-2"></i>Account</a>
                                    <a class="dropdown-item" href=""><i class="fas fa-cog mr-2"></i>Setting</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>Logout</a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest

                          <!-- strat cart -->
                          {{--

                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <span class="ml-5 p-3"><i class="fas fa-cart-plus"></i> {{count($carts)}}</span>
                            </button>

                            <!-- Modal -->
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
                                        <?php $i=0;?>
                                        @forelse($carts as $cart)
                                            <?php $i; $i++; ?>
                                            <span>{{$i}} - </span>
                                            <table class="table">



                                                <td><img src="{{$cart->proutct->image}}" width="30px" height="30px"></td>
                                                <td>{{$cart->proutct->Name}}</td>
                                                <td> ${{$cart->proutct->price}} </td>
                                                <td ><input  type="number" value="1" name="qty" style="width:50px;"></td>
                                                <td> ${{$cart->proutct->price  }}  </td>
                                                <td> <i class="far fa-times-circle"></i> </td>

                                            </table>
                                            @empty
                                                <h3>لايوجد </h3>
                                        @endforelse

                                            <hr>
                                            <h5>total:  <span></span></h5>

                                            <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a type="button" class="btn btn-primary" href="{{route('order.create')}}">Save changes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cart  -->
                           --}}
                </ul>
                </div>
            </div>

    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="/" style="border-right: 1px solid #aaa;padding-right:10px ;" target="_blank">
            <img src="imags/log h.png" alt="" style="height: 35px;width: 35px;padding-right;5px:">
            Hussein Mohamed
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                @foreach($categorys as  $category)
                        <li class="nav-item dropdown">
                            <a   class="nav-link dropdown-toggle" href="{{route('showCateogry',$category->id)}}" >
                                {{$category->Name}}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="text-uppercase text-white">{{$category->Name}}</span>
                                            <ul class="nav flex-column">
                                                @foreach($category->subcategory as  $sub)
                                                    <li class="nav-item">
                                                        <a class="nav-link " href="{{route('showsubCateogry',$sub->id)}}">{{$sub->Name}}</a>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                                <!--  /.container  -->


                            </div>
                        </li>

                @endforeach


                    @livewire('cart-counter')

            </ul>

        </div>



    </nav>
    @livewire('cart-counter')


    <!-- end navbar -->
<!--
<section class="h-100 card-hidden" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                                        class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                    <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="2" type="number"
                                           class="form-control form-control-sm" />

                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$499.00</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                    <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="2" type="number"
                                           class="form-control form-control-sm" />

                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$499.00</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                    <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="2" type="number"
                                           class="form-control form-control-sm" />

                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$499.00</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                    <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="2" type="number"
                                           class="form-control form-control-sm" />

                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$499.00</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>
-->
    <!--  اعلانات  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">


                <div class="text-center  bg-primary"> اعلانات</div>
                <div class="text-center  bg-primary"> اعلانات</div>


        </div>
    </div>
    <!--  اعلانات  -->
    <!-- ============================================================== -->

    <div class="container-fluid">

        @if (session('Sussfly'))
            <div class="alert alert-success">
                {{ session('Sussfly') }}
            </div>
        @endif

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
    <!-- ============================================================== -->
    <!-- left sidebar -->

<!-- end left sidebar -->

    <!-- ============================================================== -->
    <!-- ============================================================== -->


<!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

            <footer class="bg-dark text-light">
                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <hr class="border-top my-3">
                            <h5><img src="imags/log h.png" class="myicon" alt=""> hussein mohamed</h5>
                            <hr class="border-top my-3">
                            <p>tel:0114280576</p>
                            <p>Address:cariro,egypt</p>
                            <p>fax:333-333-332</p>
                        </div>
                        <div class="col-md-4">
                            <hr class="border-top my-3">
                            <h5><img src="imags/log h.png" class="myicon" alt=""> Imortant Links</h5>
                            <hr class="border-top my-3">
                            <p><a href="https://www.youtube.com/channel/UC6AzOI3RSOq0VDUYZ9s-reg?view_as=subscriber" target="_blank">programming</a></p>
                            <p><a href="https://www.youtube.com/channel/UC6AzOI3RSOq0VDUYZ9s-reg?view_as=subscriber" target="_blank">programming 2</a></p>
                            <p><a href="https://www.youtube.com/channel/UC6AzOI3RSOq0VDUYZ9s-reg?view_as=subscriber" target="_blank">programming 3</a></p>
                        </div>

                        <div class="col-md-4">
                            <hr class="border-top my-3">
                            <h5><img src="imags/log h.png" class="myicon" alt="">Vision</h5>
                            <hr class="border-top my-3">
                            <p>Education is first</p>
                            <p>Education  for all</p>
                            <p>Education is easy</p>
                        </div>

                    </div>
                </div>


                <hr>
                <div class="text-light text-center"> copyright &copy; 2020 @ Hussein mohamed </div>

                <hr>
            </footer>

<!-- ============================================================== -->
    <!-- end footer -->

<!-- ============================================================== -->

    <script src="{{asset('js/js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/js/popper.min.js')}}"></script>
    <script src="{{asset('js/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // executes when HTML-Document is loaded and DOM is ready

// breakpoint and up
            $(window).resize(function(){
                if ($(window).width() >= 980){

                    // when you hover a toggle show its dropdown menu
                    $(".navbar .dropdown-toggle").hover(function () {
                        $(this).parent().toggleClass("show");
                        $(this).parent().find(".dropdown-menu").toggleClass("show");
                    });

                    // hide the menu when the mouse leaves the dropdown
                    $( ".navbar .dropdown-menu" ).mouseleave(function() {
                        $(this).removeClass("show");
                    });

                    // do something here
                }
            });



// document ready
        });
    </script>
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @yield('js')

    @include('layouts.footer-scripts')
    @livewireScripts
</body>

</html>
