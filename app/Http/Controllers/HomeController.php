<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\category;
use App\Models\product;
use App\Models\SlideShow;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin ==1){
            return view('Dashbord.dashboard');
        }else{

            $data['slides']       = SlideShow::all();
            $data['categorys']    = category::all();
            $data['products']     = product::whereHas('Categorys',function($q) {
                $q->where('catogry_id','1');})->orderBy('id','DESC')->paginate(4);
            $data['products2']     = product::whereHas('Categorys',function($q) {
                $q->where('catogry_id','3');})->orderBy('id','DESC')->paginate(4);
            $data['products3']     = product::whereHas('Categorys',function($q) {
                $q->where('catogry_id','3');})->orderBy('id','DESC')->paginate(4);
            $data['products4']     = product::whereHas('Categorys',function($q) {
                $q->where('catogry_id','4');})->orderBy('id','DESC')->paginate(4);
            $data['products5']     = product::whereHas('Categorys',function($q) {
                $q->where('catogry_id','6');})->orderBy('id','DESC')->paginate(4);
            $data['carts'] = cart::all();
            return view('welcome2',$data);
        }


    }

    public function admin($id){

        $user = User::findOrFail($id);
        $user->update([
            'is_admin'  => 1 ,
        ]);
        return redirect()->back()->with('stutas','Dona');

    }
   /* public function Admin()
    {
        return view('Dashbord.dashboard');
    }*/
}
