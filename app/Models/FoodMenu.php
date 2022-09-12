<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image','description',
        'price'
    ];

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }
    public function cart(){
        return $this->hasMany(Cart::class,'id','food_menus_id');
    }
}
