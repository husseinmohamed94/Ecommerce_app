<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['subCategorys'] = SubCategory::paginate(20);
      $data['Categiers'] = category::all();

      return view('SUB_Category.index',$data);
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
            'Name_ar' =>  'required|unique:sub_categories,Name->ar|max:255',
            'Name_en' =>  'required|unique:sub_categories,Name->en|max:255',
            'Note_ar' => 'nullable',
            'Note_en' => 'nullable',
            'category_id'   => 'required',
        ]);

        try {

            $SubCategory = SubCategory::create([
                'Name' => ['ar' => $request->Name_ar, 'en' =>$request->Name_en ],
                'Note' => ['ar' => $request->Note_ar, 'en' =>$request->Note_en ],
                'category_id' => $request->category_id,
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
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $id = $request->id;
        $validate = $request->validate([
            'Name_ar' =>  'required|unique:sub_categories,Name->ar,'.$id,
            'Name_en' =>  'required|unique:sub_categories,Name->en,'.$id,
            'Note_ar' => 'nullable',
            'Note_en' => 'nullable',
            'category_id'   => 'required',
        ]);

        try {

            $SubCategory =  SubCategory::findOrFail($id);
            $SubCategory->update([
                'Name' => ['ar' => $request->Name_ar, 'en' =>$request->Name_en ],
                'Note' => ['ar' => $request->Note_ar, 'en' =>$request->Note_en ],
                'category_id' => $request->category_id,
            ]);

            session()->flash('Sussfly','created');
            return redirect()->back();

        } catch (\Exception $e) {
            return $e->getMessage();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,SubCategory $subCategory)
    {
        try {
            $SubCategory =  SubCategory::findOrFail($request->id);
            $SubCategory->delete();

            session()->flash('Sussfly','deletede');
            return redirect()->back();

        } catch (\Exception $e) {
            return $e->getMessage();

        }
    }
}
