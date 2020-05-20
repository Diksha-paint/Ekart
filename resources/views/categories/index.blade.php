@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="d-flex justify-content-between">
            <div class="card-header"><h5>Categories</h5></div>
            <div><a href=" {{route('categories.create')}} " class="btn btn-primary">Add Categories</a></div>
        </div>
    </div>
        <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><img src=" {{asset('storage/'. $category->image)}} " width="200" alt="no image found"></td>
                        <td>
                            <form action="{{route('categories.destroy', $category->slug) }}" method="POST">
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