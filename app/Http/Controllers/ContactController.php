<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Store form
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:30',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Thank you! We will contact you shortly.');
    }

    // Admin listing
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }
}
