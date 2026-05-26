<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        //Retrieve the validated contact form
        $validated = $request->validated();

        // Retrieve only some of the contact form data
        $validated = $request->safe()->only(['firstName', 'lastName', 'contactNumber',  'email', 'question']);

        //TODO Save data




        //TODO Send an email

        // back() Sends the user back to the previous page (form page)
        // with() saves the success message in the session data
        return back()->with('success', 'Message has been sent!');

    }
}