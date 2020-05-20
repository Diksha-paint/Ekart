@extends('layouts.app')
@section('content')
    <div class="card ">
        <div class="d-flex justify-content-between">
        <div class="card-header"><h5>Products</h5></div>
        <div> <a href=" {{route('products.create')}} " class="btn btn-primary">Add Products</a>
        </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td><img src=" {{asset('storage/'. $product->image)}} " width="200" alt="no image found"></td>
                        <td>{{$product->price}}</td>
                        <td>
                            <form action="{{route('products.destroy', $product->slug) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection