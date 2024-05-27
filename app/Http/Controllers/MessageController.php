<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Contact;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sentMessages = auth()->user()->messages()->with('contact')->get();
        $contactIds = Contact::where('contact_user_id', auth()->user()->id)->pluck('id')->toArray();
        $receivedMessages = Message::whereIn('contact_id', $contactIds)->with('contact')->get();
        $sentMessages = $sentMessages->merge($receivedMessages)->sortByDesc('created_at');
        return view('messages.index', compact('sentMessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = auth()->user()->contacts;
        $messageTypes = Message::getMessageTypes();
        return view('messages.create', compact('contacts', 'messageTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        auth()->user()->messages()->create($request->validated());
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }
}
