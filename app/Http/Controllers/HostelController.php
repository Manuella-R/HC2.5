<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hostels;
use Illuminate\Support\Facades\Mail;
use App\Mail\HostelApplicationMail;

class HostelController extends Controller
{
    // Method to show hostel details
    public function show($id)
    {
        $hostel = Hostels::findOrFail($id);
        return view('hostels.show', compact('hostel'));
    }

    // Method to handle sending application
// HostelController.php
public function sendApplication(Request $request, $id)
    {
        $hostel = Hostels::findOrFail($id);

        // Check if $hostel has an owner
        if (!$hostel->user) {
            return redirect()->back()->with('error', 'Hostel owner not found');
        }

        $user = auth()->user();

        // Validate the request
        $request->validate([
            'personality' => 'required|string',
            'expectations' => 'required|string'
        ]);

        // Define the email content
        $emailContent = [
            'user' => $user,
            'hostel' => $hostel,
            'personality' => $request->personality,
            'expectations' => $request->expectations
        ];

        // Send the email to the hostel owner's email address
        Mail::to($hostel->user->email)->send(new HostelApplicationMail($emailContent));

        return redirect()->back()->with('success', 'Application sent successfully!');
    }


}
