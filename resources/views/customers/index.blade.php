@extends('layouts.app')

@section('title', 'Customers list')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
            @can('create', \App\Models\Customer::class)
                <p><a href="customers/create">Add New Customer</a></p>
            @endcan
        </div>
    </div>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2">
                {{ $customer->id }}
            </div>
            <div class="col-4">
                @can('view', $customer)
                    <a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a>
                @else
                    <span>{{ $customer->name }}</span>
                @endcan
            </div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>

        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-5">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
