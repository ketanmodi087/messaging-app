@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Message</h1>
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control">
                    @foreach ($messageTypes as $typeValue => $typeLabel)
                        <option value="{{ $typeValue }}">{{ $typeLabel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="contact_id" class="form-label">Recipient</label>
                <select name="contact_id" id="contact_id" class="form-control">
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>
@endsection
