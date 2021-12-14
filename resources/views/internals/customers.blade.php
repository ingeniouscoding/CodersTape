@extends('layout')

@section('title', 'Customers list')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
            <form action="" method="POST">
                <div class="form-group pb-2">
                    <label for="name">Name</label>
                    <input type="text" name='name' value="{{ old('name') }}" class="form-control">
                </div>
                <div>{{ $errors->first('name') }}</div>

                <div class="form-group pb-2">
                    <label for="email">Email</label>
                    <input type="text" name='email' value="{{ old('email') }}" class="form-control">
                </div>
                <div>{{ $errors->first('email') }}</div>

                <div class="form-group">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select customer status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
                @csrf
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
                @foreach ($activeCustomers as $activeCustomer)
                    <li>
                        {{ $activeCustomer['name'] }}
                        <span class="text-muted">({{ $activeCustomer['email'] }})</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
                @foreach ($inactiveCustomers as $inactiveCustomer)
                    <li>
                        {{ $inactiveCustomer['name'] }}
                        <span class="text-muted">({{ $inactiveCustomer['email'] }})</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
