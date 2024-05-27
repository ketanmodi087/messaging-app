@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Message Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ ucfirst($message->type) }}</h5>
                <p class="card-text">{{ $message->content }}</p>
                <p class="card-text"><small class="text-muted">Recipient: {{ $message->contact->name }}</small></p>
                <a href="{{ route('messages.index') }}" class="btn btn-primary">Back to Messages</a>
            </div>
        </div>
    </div>
@endsection
