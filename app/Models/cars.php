<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;
    protected $fillable=['title','content','luggage','doors','passengers','price','active','image','category_id'];

 public function category(){
    return $this->belongsTo(Categories::class);
 }
 public static function CarCategorycount($category_id){
   $categoryCount=cars::where('category_id',$category_id)->where('active',1)->count();
   return $categoryCount;
 }




}
 
