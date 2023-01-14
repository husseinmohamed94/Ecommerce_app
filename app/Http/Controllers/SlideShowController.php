<?php

namespace App\Http\Controllers;

use App\Models\SlideShow;
use Illuminate\Http\Request;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $slides = SlideShow::all();
       return view('slideshow.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validtion = $request->validate([
            'image'  => 'Image|mimes:jpg,bmp,png',
            'title'  => 'nullable',
            'body'  => 'nullable',
        ]);
        $image = $request->file('image');
       $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        \Intervention\Image\Facades\Image::make($image)->resize(900,350)->save('upload/slide/' . $name_image);
        $save_url  = 'upload/slide/'.  $name_image;

        SlideShow::create([
           'title'  => $request->title,
           'body'  => $request->body,
           'image'  => $save_url,
        ]);
        session()->flash('status','تم الاضافه بنجاح');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function show(SlideShow $slideShow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function edit(SlideShow $slideShow,$id)
    {
        $slide = SlideShow::findOrFail($id);
        return  view('slideshow.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlideShow $slideShow,$id)
    {

        $oldimage = $request->oldimage;

        $slide = SlideShow::findorFail($id);
        if ($request->file('image')){

             unlink($oldimage);

            $image = $request->file('image');

            $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            \Intervention\Image\Facades\Image::make($image)->resize(900,350)->save('upload/slide/' . $name_image);
            $save_url  = 'upload/slide/'.  $name_image;

            $slide->update([
                'title'  => $request->title,
                'body'  => $request->boody,
                'image'  => $save_url,
            ]);
            session()->flash('status','تم التعديل بنجاح بنجاح');
            return redirect()->back();

        }else{

            $slide->update([
                'title'  => $request->title,
                'body'  => $request->boody,

            ]);
            session()->flash('status','تم التعديل بنجاح');
            return redirect()->route('slide.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,SlideShow $slideShow,$id)
    {
        $oldimage = $request->oldimage;
        if(!empty($oldimage)){
            SlideShow::findOrFail($id)->delete();

            $notification = array(
                'message_id' => 'Product DELETE  Successfully',
                'alert-type' => 'warning'
            );
            return redirect()->route('Product.index')->with($notification);
        }else{
            unlink($oldimage);
            SlideShow::findOrFail($id)->delete();

            $notification = array(
                'message_id' => 'Product DELETE  Successfully',
                'alert-type' => 'warning'
            );
            return redirect()->route('Product.index')->with($notification);
        }


    }
}
