@extends('layouts.app')
@section('content')
    <form action="{{ route('register.action') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                Registration
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control @error('name')
                        is-invalid
                    @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="form-control @error('email')
                    is-invalid
                @enderror">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password')
                    is-invalid
                @enderror">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
