<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File ;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = FoodMenu::all();
        return view('admin.food.index',compact('food'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file =  $request->file('image');
        $file_name = $file->getClientOriginalName();

        $file->move(public_path('/imagess/food/'),$file_name);
        FoodMenu::create([
            'title' => $request->title,
            'image' => $file_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('success','Create Food');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $food = FoodMenu::where('id',$id)->first();
       return view('admin.food.edit',compact('food'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        $food = FoodMenu::where('id',$id)->first();
        $c_file_name = $food->image;
      
        
        //choose
        if($file !== null){
            $file_name = $file->getClientOriginalName();
            File::delete('/imagess/food/',$c_file_name);
            $food->update([
                'title' => $request->title,
                'image' => $file_name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
            $file->move(public_path('/imagess/food/'),$file_name);
            return redirect()->back()->with('success','Updated Food');
            
        }
        $food->update([
            'title' => $request->title,
            'image' => $c_file_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('success','Updated Food');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $food = FoodMenu::where('id',$id);
     
       File::delete(public_path('/imagess/food/'.$food->first()->image));
       $food->delete();
       return redirect()->back()->with('success','Food Delete');
    }
}
