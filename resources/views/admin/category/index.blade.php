@extends('admin.layout.master')

@section('content')
<div class="container">
    <a href="{{ route('category.create') }}" class="btn btn-lg btn-success">Create</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Image</th>
             <th>Name</th>
            <th>Option</th>
        </tr>
        @foreach ($category as $c)
            <tr>
            <td>{{ $c->id }}</td>          
            <td>
                <img src="{{ '/imagess/'.$c->image }}" alt="pizza" class="img-thumbnail" style="width:15%;">
            </td>
             <td>{{ $c->name }}</td>
            <td>
                <a href="{{ route('category.edit',$c->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <div style="display:inline-block;">
                    <form action="{{ route('category.destroy',$c->id)}}" method="POST">
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