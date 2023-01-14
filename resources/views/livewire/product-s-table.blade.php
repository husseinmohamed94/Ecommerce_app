

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

                            <form  wire:submit.prevent="addToCart({{$product->id}})" action="{{route('Cart.store')}}" method="post">
                                @csrf
                                <input type="number"  wire:model="qtyinput.{{$product->id}}" class="qtyinput"  >
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


