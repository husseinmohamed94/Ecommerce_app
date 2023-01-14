<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\category;
use App\Models\product;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['slides']       = SlideShow::all();
       $data['categorys']    = category::all();
       $data['products']     = product::whereHas('Categorys',function($q) {
           $q->where('catogry_id','1');})->orderBy('id','DESC')->paginate(4);
       $data['products2']     = product::whereHas('Categorys',function($q) {
           $q->where('catogry_id','2');})->orderBy('id','DESC')->paginate(4);
       $data['products3']     = product::whereHas('Categorys',function($q) {
           $q->where('catogry_id','3');})->orderBy('id','DESC')->paginate(4);
         $data['products4']     = product::whereHas('Categorys',function($q) {
           $q->where('catogry_id','4');})->orderBy('id','DESC')->paginate(4);
         $data['products5']     = product::whereHas('Categorys',function($q) {
           $q->where('catogry_id','6');})->orderBy('id','DESC')->paginate(4);
         $data['carts'] = cart::all();

        return view('welcome2',$data);











    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['categorys']    = category::all();
        $data['carts'] = cart::all();
        $data['product'] =   product::findOrFail($id);
        return view('front.details_product',$data);
    }
  public function showCateogry($id)
    {
        $data['carts'] = cart::all();
        $data['categorys']    = category::all();
        $data['products'] =   product::with('Categorys')->where('catogry_id',$id)->orderBy('id','DESC')->get();
      return  view('front.show_category',$data);

    }
    public function showsubCateogry($id)
    {
        $data['carts'] = cart::all();
        $data['categorys']    = category::all();
        $data['products'] = product::with('SubCategorys')->where('subCategory_id',$id)->orderBy('id','DESC')->get();
        return  view('front.show_category',$data);


    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
