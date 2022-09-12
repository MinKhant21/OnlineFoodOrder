<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/imagess'),$file_name);
        
        Category::create([
            'slug' => uniqid().$request->name,
            'name' => $request->name,
            'image' => $file_name,
        ]);

        return redirect()->back()->with('success','Created');
  
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
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
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
        $name = $request->name;
        $file = $request->file('image');
        
        
        $category = Category::where('id',$id);
        
       
        //choose img
        if($file !== null){
            $c_file_name =uniqid().$file->getClientOriginalName();
            File::delete(public_path('/imagess/'.$category->first()->image));
            $category->update([
                'slug' => uniqid().$request->name,
                'name' => $request->name,
                'image' => $c_file_name,
            ]);
            $file->move(public_path('/imagess'),$c_file_name);
            return redirect()->back()->with('success','Updated');
        }
        //no choose img
        
        $category->update([
            'slug' => uniqid().$request->name,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success','Updated');
        

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id',$id);
        
      
        //local img del
   
        File::delete(public_path('/imagess/'.$category->first()->image));
        //db delete
        $category->delete();
        return redirect()->back()->with('success','Delete');

    }
}
