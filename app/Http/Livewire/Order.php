<?php

namespace App\Http\Livewire;

use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class Order extends Component
{



    public $i = 1;
    public $SuccessMessage = '';
    public $catchError;
    public $currentStep = 1;
    public $product_id = [];
    public $qty = [];

    public  $phone,$address,$pamy;
    public function render()
    {

        return view('livewire.order');
    }
    public function back($step){
        $this->currentStep = $step;
    }
    public function mount(){
     //   $order = new  \App\Models\Order();
    //    $this->product_id = $order->product_Id;

    }
    public function retieveOrde(){
        //$order =\App\Models\Post::whereSlug($slug)->first();
      //  $order = \App\Models\Order::all();
    //    $this->product_id = $order->product_Id;



    }
    public function firstStepSubmit(){


        $validatedData = $this->validate([

            //'phone'                           =>'regex:/^([0-9\s\-\+(\)]*)$/|min:10',
            'phone'                             =>'required',
            'address'                           =>'required',
        ]);


        $this->currentStep = 2;
        foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row){
            $this->product_id[]= $row->id;
            $this->qty[] = $row->qty;
        }

    }

   /* public $inputs = [
        [
            "qty" => "",
            "product_id" => "",
            "phone" => "",
            "date" => "",
            "time" => "",
            "address" => "",
            "user_id" => "",
        ]
    ];

    public function add($i)
    {
        array_push($this->inputs, [
            "qty" => "",
            "product_id" => "",
            "phone" => "",
            "date" => "",
            "time" => "",
            "address" => "",
            "user_id" => "",
        ]);
    }
*/





    public function submitForm(){
       $order = new \App\Models\Order();

      $qty            = array_sum($this->qty);
     $product       = $this->product_id;

        /*foreach ($this->inputs as $key => $value) {
            $bel = \App\Models\Order::create([
                'qty'                 => $this->qty[$key],
                'product_id'          => $this->product_id[$key],
                'phone'               =>   $this->phone,
                'date'                 =>  date('Y-m-d'),
                'time'                 =>  now(),
                'address'               =>  $this->address,
               'user_id'                =>  auth()->user()->id,
            ]);
        }
        $this->inputs = [];*/


 //for($i = 0; $i < count($product); $i++){
        $order->qty                = $this->qty;
        $order->product_id         = $product;
        $order->phone              = $this->phone;
        $order->date               = date('Y-m-d');
        $order->time               = now();
        $order->address            = $this->address;
        $order->user_id            = auth()->user()->id;

        $order->save();

        $notification = array(
            'message_id' => '  Successfully Add Cart',
            'alert-type' => 'info'
        );
        return  redirect()->back()->with($notification);

 // }




      /*  \App\Models\Order::create([
                'qty'                => $this->qty,
                'product_id'         => $this->product_id,
                'phone'              => $this->phone,
                'date'               => date('Y-m-d'),
                'time'               => now(),
                'address'            => $this->address,
                'user_id'            => auth()->user()->id,
            ]);*/





    }
}
