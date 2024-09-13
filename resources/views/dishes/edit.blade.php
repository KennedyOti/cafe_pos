@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <h1>Edit Dish</h1>
        <form action="{{ route('dishes.update', $dish->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $dish->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" step="0.01" class="form-control" value="{{ $dish->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="{{ $dish->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $dish->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3">Update Dish</button>
        </form>
    </div>
@endsection
