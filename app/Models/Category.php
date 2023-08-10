<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['parent_id', 'name'];


public function tags()
    {
           $categories = Category::where('parent_id', '=', 0)->get();

        //$allCategories = Category::pluck('name','id')->all();

        return $categories;
    }

    public function parent(){
        return $this->belongsTo('\App\Models\Category', 'parent_id',0);
    }

    public function children()

    {
      return $this->hasMany('App\Models\Category', 'parent_id','id');
  }

  public function subcategories(){

    return $this->hasMany('App\Models\Category', 'parent_id');

}

/*
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');

    } */

    public function review()
   {
       return $this->belongsTo('App\Models\Review','id');
   }

}