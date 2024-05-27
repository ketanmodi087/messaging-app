@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Messages</h1>
        <a href="{{ route('messages.create') }}" class="btn btn-primary">New Message</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>To</th>
                    <th>Content</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sentMessages as $sentMessage)
                    <tr>
                        <td>{{ $sentMessage->contact->name }}</td>
                        <td>{{ $sentMessage->content }}</td>
                        <td>{{ ucfirst($sentMessage->type) }}</td>
                        <td>
                            <a href="{{ route('messages.show', $sentMessage->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
