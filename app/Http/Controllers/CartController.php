<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
//use \Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{


    public function AddProduct(Request $request){
        $product_id        = $request->input('product_id');
        $qtyinput          = $request->input('qtyinput');

        $cartItem = new cart();
        $cartItem->user_id = 1;
        $cartItem->product_id = $product_id;
        $cartItem->product_qty =$qtyinput;
        $cartItem->save();

        $notification = array(
            'message_id' => 'Product cart  Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

        /*if(Auth::check()){
            $productcheck = product::where('id',$product_id)->first();
            if ($productcheck){

                if (cart::where('product_id',$product_id)->exists()){
                    return response()->json(['status',$productcheck->Name . "alreed add to cart" ]);

                }else{
                    $cartItem = new cart();
                    $cartItem->user_id = 1;
                    $cartItem->product_id = $product_id;
                    $cartItem->product_qty =$qtyinput;
                    $cartItem->save();

                    $notification = array(
                        'message_id' => 'Product cart  Successfully',
                        'alert-type' => 'info'
                    );
                    return redirect()->back()->with($notification);

                }



            }
        }else{
            return response()->('login');
        }
*/


    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $product = product::findorFail($request->input('product_id'));
        \Gloudemans\Shoppingcart\Facades\Cart::add(
            $product->id,
            $product->Name,
            $request->input('qtyinput'),
            $product->price  ,
        );


        $product_id        = $request->input('product_id');
        $qtyinput          = $request->input('qtyinput');

        $cartItem = new cart();
        $cartItem->user_id = 1;
        $cartItem->product_id = $product_id;
        $cartItem->product_qty =$qtyinput;
        $cartItem->save();

        $notification = array(
            'message_id' => '  Successfully Add Cart',
            'alert-type' => 'info'
        );
        return  redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }
}
