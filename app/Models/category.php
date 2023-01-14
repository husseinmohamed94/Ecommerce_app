<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class category extends Model
{

    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name','Note'];


    protected $fillable = ['Name','Note'];

    public function product(){
        return $this->hasMany(product::class,'catogry_id');
    }
    public function subcategory(){
        return $this->hasMany(SubCategory::class,'category_id');
    }
}
