<?php

namespace App\Http\Controllers;

// app/Http/Controllers/SubscriberController.php

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
 use App\Mail\SubscriberWelcomeMail;

use App\Mail\SubscriberBroadcastMail;


class SubscriberController extends Controller
{

public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:subscribers,email'
    ]);

    $subscriber = Subscriber::create([
        'email' => $request->email
    ]);

    // Send welcome email
    Mail::to($subscriber->email)->send(
        new SubscriberWelcomeMail($subscriber->email)
    );

    return response()->json([
        'success' => true,
        'message' => 'Subscribed successfully. Please check your email.'
    ]);
}


    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }
//    
public function sendMessage(Request $request)
{
    $request->validate([
        'emails' => 'required|array',
        'message' => 'required'
    ]);

    foreach ($request->emails as $email) {
        Mail::to($email)->send(
            new SubscriberBroadcastMail($request->message)
        );
    }

    return response()->json([
        'message' => 'Message sent successfully'
    ]);
}

}
