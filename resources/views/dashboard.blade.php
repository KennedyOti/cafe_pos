@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">{{ __('Dashboard') }}</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        {{ __('Cafe Hotel POS Dashboard') }}
                    </div>

                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            {{ __("You're logged in!") }}
                        </div>
                        <p>Welcome to the Cafe Hotel POS system. Use the navigation menu to manage dishes, view sales, or perform other tasks.</p>
                        <a href="{{ route('dishes.index') }}" class="btn btn-primary">Manage Dishes</a>
                        <a href="{{ route('sales.index') }}" class="btn btn-secondary">View Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
