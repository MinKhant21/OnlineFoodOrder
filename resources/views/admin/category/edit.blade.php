@extends('admin.layout.master')

@section('content')
<div class="container">
    <div>
        <a href="{{ route('category.index') }}" class="btn btn-dark" style="margin-top: 2%;margin-left: 1.5%;" >Back</a>
    </div>
    
  
    <div class="container" style="padding-top:2%;">
        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control"  width="30%" value="{{ $category->name }}">
            </div>
            
            <div>
                <label for="image" class="form-label">Image</label>
                <div>
                    <img src="{{ '/imagess/'.$category->image }}" alt="Image" class="img-thumbnail" style="width: 10%;">
                </div>
               
                <input type="file" name="image" class="form-control"  width="30%">
            </div>
            <div style="padding-top: 2%;">
                <input type="submit" value="Update" class="btn btn-primary ">
            </div>
            
       </form>
    </div>
        

   
</div>
   
    
@endsection