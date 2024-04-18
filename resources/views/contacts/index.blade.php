@extends('layouts.app')
@section('content')
    <form action="{{ route('contacts.index') }}" class="mb-3">
        <input type="search" name="search" class="form-control" placeholder="Search contact...">
    </form>
    <table class="table">
        <thead>
            <th>NAME</th>
            <th>COMPANY</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }} </td>
                    <td>{{ $contact->company }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td style="width: 150px">
                        <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
                        <button class="btn btn-delete" data-toggle="modal" data-target="#deleteModal"
                            data-id="{{ $contact->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
@endsection
@push('modals')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body p-4 text-center">

                    <h4>Are you sure you want to DELETE?</h4>
                </div>
                <div class="modal-footer">
                    <form id="delete-form" action="{{ route('contacts.destroy', '') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-delete').on('click', function() {
                $id = $(this).data('id');
                $url = `{{ route('contacts.destroy', '') }}`

                $('#delete-form').attr('action', `${$url}/${$id}`)
            })
        })
    </script>
@endpush
