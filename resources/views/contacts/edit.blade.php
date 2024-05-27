@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Contact</h1>
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
