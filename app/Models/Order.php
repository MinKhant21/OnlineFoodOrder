<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','food_menus_id','total_quantity','date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function foodmenu(){
        return $this->belongsTo(FoodMenu::class);
    }
}
