@extends("layout.master")

@extends('layout.nav')
 

@section('content')
    
<div class="container" style="margin-top:10%;">
    <div class="card">
        <div class="card-body">
                <h2>Your Cart List</h2>
                <table class="table table-striped">
                        <thead>
                                <tr>
                                      
                                        <th>Image</th>
                                        <th>Name</th>                                                                      
                                        <th>Total Qty</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>

                                @php
                                    $total_price = 0;
                                @endphp
                                
                              
                                @foreach ($carts as $c)
                                  @php
                                    $total_price += $c->total_quantity*$c->FoodMenus[0]->price;

                                @endphp
                                <tr>
                                    <td>
                                            <img src="{{ './imagess/food/'.$c->FoodMenus[0]->image }}" width="50" class="img-thumbnail" alt="">
                                    </td>
                                    <td>
                                           {{ $c->FoodMenus[0]->title }}
                                    </td>
                                    <td>
                                            {{$c->total_quantity}}
                                    </td>
                                    <td>
                                        {{ $c->FoodMenus[0]->price * $c->total_quantity }}
                                    </td>
                                    <td>
                                            <a href="{{ url('/remove-cart/'.$c->id) }}" class="btn btn-lg btn-danger">-</a>
                                            <a href="{{ url('/add-cart/'.$c->id) }}" class="btn btn-lg btn-danger">+</a>
                                            <a href="{{ url('/cancel/'.$c->id) }}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash">Cancel</i>
                                            </a>
                                    </td>
                                </tr>
                                @endforeach
                                    
                                    <tr >
                                        <td colspan="5">
                                                <span style="float:right;padding:1%;">
                                                        <span>Total Price : <b>{{ $total_price }}</b>MMK</span>
                                                        <a href="{{ 'checkout' }}"  style="padding: 2%;margin-top:4%;" class="btn btn-primary">CheckOut</a>
                                                </span>
                                        </td>
                                    </tr>
                             
                                
                        </tbody>
                </table>
                
        </div>
</div>
</div>




@endsection
   
