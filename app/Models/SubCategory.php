<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name','Note'];


    protected $fillable = ['Name','Note','category_id'];

    public function  category(){
        return $this->belongsTo(category::class,'category_id');
    }

}
