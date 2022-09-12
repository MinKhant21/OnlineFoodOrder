@extends('admin.layout.master')

@section('content')
<div class="container">
    <div>
        <a href="{{ route('category.index') }}" class="btn btn-dark" style="margin-top: 2%;margin-left: 1.5%;" >Back</a>
    </div>
    
  
    <div class="container" style="padding-top:2%;">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control"  width="30%">
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control"  width="30%">
            </div>
            <div style="padding-top: 2%;">
                <input type="submit" value="Create" class="btn btn-success ">
            </div>
            
       </form>
    </div>
        

   
</div>
   
    
@endsection