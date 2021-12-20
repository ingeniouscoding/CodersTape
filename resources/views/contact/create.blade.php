@extends('layout')

@section('title', 'Contact us')

@section('content')
    <h1>Contact Us</h1>

    <form action="/contact" method="POST">
        <div class="form-group pb-2">
            <label for="name">Name</label>
            <input type="text" name='name' value="{{ old('name') }}" class="form-control">
        </div>
        <div>{{ $errors->first('name') }}</div>

        <div class="form-group pb-2">
            <label for="email">Email</label>
            <input type="text" name='email' value="{{ old('email') }}" class="form-control">
            <div>{{ $errors->first('email') }}</div>
        </div>

        <div class="form-group pb-2">
            <label for="message">Message</label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
            <div>{{ $errors->first('message') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>

        @csrf
    </form>
@endsection
