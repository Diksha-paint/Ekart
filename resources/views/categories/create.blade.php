@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Add Categories</div>
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <select name="category_name" id="category_name" class="form-control">
                        <option value="women">Women</option>
                        <option value="men">Men</option>
                        <option value="kids">Kids</option>
                        <option value="essentials">Essentials</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button class="btn btn-success" type="submit">Add</button>
            </form>
        </div>
    </div>

@endsection