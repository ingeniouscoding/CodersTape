@extends('layout')

@section('title', 'Customers list')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
            <p><a href="customers/create">Add New Customer</a></p>
        </div>
    </div>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2">
                {{ $customer->id }}
            </div>
            <div class="col-4">{{ $customer->name }}</div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>

        </div>
    @endforeach


@endsection
