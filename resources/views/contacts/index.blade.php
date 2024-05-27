@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact List</h1>
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add New Contact</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contactUser->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
