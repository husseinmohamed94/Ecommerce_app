<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::paginate(20);
       return  view('Product.index',compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Catogrys = category::all();
       return view('Product.create',compact('Catogrys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
           'Name_ar'        =>  'required|unique:products,Name->ar|max:255',
           'Name_en'        =>  'required|unique:products,Name->en|max:255',
           'details_ar'     => 'required',
           'details_en'     => 'required',
           'price'          => 'required|numeric',
           'status'         => 'required',
            'qty'           => 'required|numeric',
            'image'         => 'nullable|Image|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
       ]);

        try {
            $image = $request->file('image');
            $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            \Intervention\Image\Facades\Image::make($image)->resize(300,300)->save('upload/product/' . $name_image);
            $save_url  = 'upload/product/'.  $name_image;

                product::create([

                'Name'              => ['ar'=> $request->Name_ar,'en'=>$request->Name_en],
                'details'           => ['ar'=>$request->details_ar,'en'=>$request->details_en],
                'price'             => $request->price ,
                'status'             => $request->status,
                'qty'                 =>  $request->qty,
                'catogry_id'           => $request->catogry_id ,
                'subCategory_id'       =>  $request->sub_catogry,
                'image'             =>  $save_url,
                    ]);
                    $notification = array(
                        'message_id' => 'Product create  Successfully',
                        'alert-type' => 'info'
                    );

                return redirect()->back()->with($notification);




        }  catch (\Exception $e){
            return  redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,product $product,$id)
    {
       $product =  product::findOrFail($id);
        $Catogrys = category::all();
        return view('Product.edit',compact('Catogrys','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product,$id)
    {


        $validate = $request->validate([
            'Name_ar'        =>  'required|unique:products,Name->ar' . $id,
            'Name_en'        =>  'required|unique:products,Name->en' . $id,
            'details_ar'     => 'required',
            'details_en'     => 'required',
            'price'          => 'required|numeric',
            'status'         => 'required',
            'qty'           => 'required|numeric',
            //'image'         => 'nullable|Image|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
        ]);

        try {
            $product =  product::findOrFail($id);
            $oldimage = $request->oldimage;

            if ($request->file('image')){
               unlink($oldimage);

                $image = $request->file('image');
                $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                \Intervention\Image\Facades\Image::make($image)->resize(300,300)->save('upload/product/' . $name_image);
                $save_url  = 'upload/product/'.  $name_image;

                $product->update([

                    'Name'              => ['ar'=> $request->Name_ar,'en'=>$request->Name_en],
                    'details'           => ['ar'=>$request->details_ar,'en'=>$request->details_en],
                    'price'             => $request->price ,
                    'status'             => $request->status,
                    'qty'                 =>  $request->qty,
                    'catogry_id'           => $request->catogry_id ,
                    'subCategory_id'       =>  $request->sub_catogry,
                    'image'             =>  $save_url,
                ]);
                $notification = array(
                    'message_id' => 'Product update  Successfully',
                    'alert-type' => 'info'
                );
                return redirect()->route('Product.index')->with($notification);

            }else{
                $product->update([

                    'Name'              => ['ar'=> $request->Name_ar,'en'=>$request->Name_en],
                    'details'           => ['ar'=>$request->details_ar,'en'=>$request->details_en],
                    'price'             => $request->price ,
                    'catogry_id'           => $request->catogry_id ,
                    'subCategory_id'       =>  $request->sub_catogry,

                ]);
                $notification = array(
                    'message_id' => 'Product update  Successfully',
                    'alert-type' => 'info'
                );
                return redirect()->route('Product.index')->with($notification);
            }





        }  catch (\Exception $e){
            //   return  redirect()->back()->withErrors(['error'=>$e->getMessage()]);
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,product $product,$id)
    {

        $oldimage = $request->oldimage;
        if(!empty($oldimage)){
            product::findOrFail($id)->delete();
            $notification = array(
                'message_id' => 'Product DELETE  Successfully',
                'alert-type' => 'warning'
            );
            return redirect()->route('Product.index')->with($notification);
        }else{
            unlink($oldimage);
            product::findOrFail($id)->delete();
            $notification = array(
                'message_id' => 'Product DELETE  Successfully',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }



    }

    public function get_subcatogry($id){
        $get_subcatogry  = SubCategory::where('category_id',$id)->pluck('Name','id');

        return $get_subcatogry;

    }
}
