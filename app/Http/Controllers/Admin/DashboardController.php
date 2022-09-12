<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        
        $jan =  Order::whereYear('date', '2022')
            ->whereMonth('date', 1)
            ->count();
        $feb =  Order::whereYear('date', '2022')
            ->whereMonth('date', 2)
            ->count();
        $march =  Order::whereYear('date', '2022')
            ->whereMonth('date', 3)
            ->count();
        $ap =  Order::whereYear('date', '2022')
            ->whereMonth('date', 4)
            ->count();
        $may =  Order::whereYear('date', '2022')
            ->whereMonth('date', 5)
            ->count();
        $june =  Order::whereYear('date', '2022')
            ->whereMonth('date', 6)
            ->count();
        $july =  Order::whereYear('date', '2022')
            ->whereMonth('date', 7)
            ->count();
        
        $august = Order::whereYear('date', '2022')
        ->whereMonth('date', 8)
        ->count();
        $setember = Order::whereYear('date', '2022')
        ->whereMonth('date', 9)
        ->count();
        $october = Order::whereYear('date', '2022')
        ->whereMonth('date', 10)
        ->count();
        $november = Order::whereYear('date', '2022')
        ->whereMonth('date', 11)
        ->count();
        $december = Order::whereYear('date', '2022')
        ->whereMonth('date', 12)
        ->count();
        $data = [$jan, $feb, $march, $ap, $may, $june,$july,$august,$setember,$october,$november,$december];


        $user = User::where('role', 'user')->latest()->take(5)->get();

        return view('admin.dashboard',compact('data', 'user'));
    }
}
