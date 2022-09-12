<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FoodMenu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function addtocart(Request $request,$id){
        $food = FoodMenu::where('id',$id)->first();
        $qty = $request->qty;
        
        Cart::create([
            'user_id' => auth()->user()->id,
            'food_menus_id' => $food->id,
            'total_quantity' => $qty,
        ]);
        return redirect('/')->with('success','Added To Cart');
    }

    public function addcart($id){
        $cart = Cart::where('id',$id)->first();
        $cart->update([
            'total_quantity' => DB::raw('total_quantity+1'),
        ]);
        return redirect()->back();
    }

    public function removecart($id){
        $cart = Cart::where('id',$id)->first();
        $cart->update([
            'total_quantity' => DB::raw('total_quantity-1'),
        ]);
        return redirect()->back();
    }

    public function cancel($id){
        $cart = Cart::where('id',$id)->first();
        $cart->delete();
        return redirect()->back();
    }

    public function showcart(){
        $carts = Cart::with('FoodMenus')->get();
        return view('cart',compact('carts'));
    }

    public function checkout(){
      
        $cart = Cart::where('user_id', auth()->id());
        foreach($cart->get() as $c){
            Order::create([
                'user_id' => auth()->user()->id,
                'food_menus_id' => $c->FoodMenus[0]->id,
                'total_quantity' => $c->total_quantity,
                'date' => date('Y-m-d'),
            ]);
        }

        $cart->delete();
        return redirect('/')->with('success',"Thank You!");

    }
}
