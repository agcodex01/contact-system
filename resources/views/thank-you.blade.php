@extends('layouts.app')
@section('content')
    <div class="text">
        <h1>Thank you for registering</h1>
        <a href="{{ route('contacts.index') }}" class="btn btn-link">Continue</a>
    </div>
@endsection
