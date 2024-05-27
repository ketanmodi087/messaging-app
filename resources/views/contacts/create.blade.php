@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Contact</h1>
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact_user_id">Contact</label>
                <select name="contact_user_id" id="contact_user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} ( {{ $user->email }} )
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
