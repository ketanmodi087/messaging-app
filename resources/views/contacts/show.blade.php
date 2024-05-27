@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact Details</h1>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $contact->contactUser->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $contact->phone }}</td>
            </tr>
        </table>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
