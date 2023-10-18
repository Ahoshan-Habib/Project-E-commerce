<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['id','cat_id','subcat_id','brand_id','unit_id','size_id','color_id','code','name','description','price','image','status'];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcat_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }
    public static function catproductCount($cat_id){
        $catCount=Product::where('cat_id',$cat_id)->where('status',1)->count();
        return $catCount;
    }
    public static function subcatproductCount($subcat_id){
        $subcatCount=Product::where('subcat_id',$subcat_id)->where('status',1)->count();
        return $subcatCount;
    }
    public static function brandproductCount($brand_id){
        $brandCount=Product::where('brand_id',$brand_id)->where('status',1)->count();
        return $brandCount;
    }
}
