<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /* =========================
       FRONTEND: STORE CONTACT
    ========================== */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:30',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'reply_status' => 'pending',
            'is_viewed' => false,
        ]);

        return back()->with('success', 'Thank you! We will contact you shortly.');
    }

    /* =========================
       ADMIN: LIST CONTACTS
    ========================== */
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    /* =========================
       ADMIN: VIEW CONTACT (AJAX)
    ========================== */
    public function show(Contact $contact)
    {
        if (!$contact->is_viewed) {
            $contact->update(['is_viewed' => true]);
        }

        return response()->json([
            'id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'message' => $contact->message,
        ]);
    }

    /* =========================
       ADMIN: REPLY TO CONTACT
    ========================== */
    public function reply(Request $request, Contact $contact)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        // Send email
        Mail::raw($request->reply_message, function ($mail) use ($contact) {
            $mail->to($contact->email)
                 ->subject('Reply from BTMG Trainings');
        });

        // Update status
        $contact->update([
            'reply_status' => 'replied',
        ]);

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Reply sent successfully.');
    }
}
