<?php

namespace App\Http\Livewire;

use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductSTable extends Component
{
    public array $qtyinput = [];
    public $products;
    public function mount(){
        $this->products    = product::all();
        foreach ($this->products as $product){
            $this->qtyinput[$product->id] = 1;
        }
    }

    public function render()
    {
        $products     = product::whereHas('Categorys',function($q) {
            $q->where('catogry_id','1');})->orderBy('id','DESC')->paginate(4);
        $cart_count = Cart::content()->count();
        return view('livewire.product-s-table',compact('cart_count','products'));
    }








    public function addToCart($product_id){
        $product = product::findorFail($product_id);
       Cart::add(
            $product->id,
            $product->Name,
            $this->qtyinput[$product_id],
            $product->price  ,
        );
        $notification = array(
            'message_id' => '  Successfully Add Cart',
            'alert-type' => 'info'
        );
        return  redirect()->back()->with($notification);

    }


}
