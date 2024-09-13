@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <h1>Add New Dish</h1>
        <form action="{{ route('dishes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="0" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3">Add Dish</button>
        </form>
    </div>
@endsection
