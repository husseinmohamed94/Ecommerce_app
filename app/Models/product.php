<?php

namespace App\Models;

use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class product extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name','details'];
    protected $guarded = [];


    public function Categorys(){
       return $this->belongsTo(category::class,'catogry_id');
    }
    public function SubCategorys(){
     return   $this->belongsTo(SubCategory::class,'subCategory_id');
    }
}

