@extends('admin.layout.master')

@section('content')
<div class="container">
    <a href="{{ route('food.create') }}" class="btn btn-lg btn-success">Create</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>       
            <th>Description</th>
            <th>Price</th>
            <th>Option</th>
        </tr>
        @foreach ($food as $f)
        <tr>
            <td>{{ $f->id }}</td>
            <td>
                <img src="{{ '/imagess/food/'.$f->image }}" class="img-thumbnail img-fluid" alt="image" style="width: 30%;" >
            </td>
            <td>{{ $f->title }}</td>
            <td>{{ $f->description }}</td>
            <td>{{ $f->price }} <span>MMK</span> </td>
            <td>
                <a href="{{ route('food.edit',$f->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <div style="display:inline-block;">
                    <form action="{{ route('food.destroy',$f->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                    </form>
                </div>
    
            </td>
           </tr>
            
        @endforeach
       
    </table>
</div>
   
    
@endsection