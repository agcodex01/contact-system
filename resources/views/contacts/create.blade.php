@extends('layouts.app')
@section('content')
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                Add Contact
            </div>
            <div class="card-body">
                <x-contact-upsert :contact="$contact"></x-contact-upsert>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
