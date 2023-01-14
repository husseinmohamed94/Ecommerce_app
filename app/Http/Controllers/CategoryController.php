<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categiers = category::paginate(20);
        return view('Category.index',compact('Categiers'));
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
        $validate = $request->validate([
            'Name_ar' =>  'required|unique:categories,Name->ar|max:255',
            'Name_en' =>  'required|unique:categories,Name->en|max:255',
            'Note_ar' => 'nullable',
            'Note_en' => 'nullable',
        ]);

        try {

          $category = category::create([
                'Name' => ['ar' => $request->Name_ar, 'en' =>$request->Name_en ],
                'Note' => ['ar' => $request->Note_ar, 'en' =>$request->Note_en ]
          ]);

            session()->flash('Sussfly','created');
            return redirect()->back();

        } catch (\Exception $e) {
            return $e->getMessage();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $id = $request->id;
        $validate = $request->validate([
            'Name_ar' =>  'required|unique:categories,Name->ar,'.$id,
            'Name_en' =>  'required|unique:categories,Name->en,'.$id,
            'Note_ar' => 'nullable',
            'Note_en' => 'nullable',
        ]);

        try {
            $category = category::findOrFail($id);
            $category->update([
                'Name' => ['ar' => $request->Name_ar, 'en' =>$request->Name_en ],
                'Note' => ['ar' => $request->Note_ar, 'en' =>$request->Note_en ]
            ]);

            session()->flash('Sussfly','تم التعديل بنجاح');
            return redirect()->back();

        } catch (\Exception $e) {
            return $e->getMessage();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,category $category)
    {

        try {
            $category = category::findOrFail($request->id);
            $category->delete();

            session()->flash('Sussfly','تم الحذف');
            return redirect()->back();

        } catch (\Exception $e) {
            return $e->getMessage();

        }
    }
}
