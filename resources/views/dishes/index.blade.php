@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">Dishes List</h3>
            </div>
            <div class="card-body">
                <!-- Success and Error Messages -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Search Form -->
                <form method="GET" action="{{ route('dishes.index') }}" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search dishes..."
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>

                <!-- Dishes Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dishes as $dish)
                                <tr>
                                    <td>{{ $dish->id }}</td>
                                    <td>{{ $dish->name }}</td>
                                    <td>{{ $dish->price }}</td>
                                    <td>{{ $dish->quantity }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <!-- Edit Button -->
                                            <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <!-- Sell Form -->
                                            <form action="{{ route('dishes.sell', $dish->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                <input type="number" name="quantity" class="form-control d-inline-block"
                                                    style="width: 80px;" placeholder="Qty" required>
                                                <button type="submit" class="btn btn-success ms-2">
                                                    <i class="fas fa-dollar-sign"></i> Sell
                                                </button>
                                            </form>

                                            <!-- Delete Form -->
                                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                                                class="d-inline-block ms-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('dishes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Dish
                </a>
            </div>
        </div>
    </div>
@endsection
