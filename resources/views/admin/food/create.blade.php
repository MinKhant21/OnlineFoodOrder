@extends('admin.layout.master')

@section('content')
<div class="container">
    <div>
        <a href="{{ route('food.index') }}" class="btn btn-dark" style="margin-top: 2%;margin-left: 1.5%;" >Back</a>
    </div>
    
  
    <div class="container" style="padding-top:2%;">
        <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control"  width="30%">
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control"  width="30%">
            </div>
            <div>
                <label for="price" class="form-label">Price</label>
                <input type="integer" name="price" class="form-control"  width="30%">
            </div>
            <div>
                <label for="description" class="form-label">Desprition</label>
                <input type="text" name="description" class="form-control"  width="30%">
            </div>

            <div style="padding-top: 2%;">
                <input type="submit" value="Create" class="btn btn-success ">
            </div>
            
       </form>
    </div>
        

   
</div>
   
    
@endsection