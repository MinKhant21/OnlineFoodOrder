<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','food_menus_id',
        'total_quantity'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function foodmenu(){
    //     return $this->belongsTo(FoodMenu::class,'id','food_menus_id');
    // }

    public function FoodMenus()
    {
        return $this->hasMany(FoodMenu::class,'id', 'food_menus_id');
    }

}
