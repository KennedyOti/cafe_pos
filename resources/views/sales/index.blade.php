@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">Sales History</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Dish Name</th>
                                <th>Quantity Sold</th>
                                <th>Total Sales (Cash)</th>
                                <th>Date of Sale</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->dish->name }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ $sale->dish->price * $sale->quantity }} Ksh</td>
                                    <td>{{ $sale->created_at->format('d-m-Y H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
