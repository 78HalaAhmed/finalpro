<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Session;

class ContactController extends Controller
{
    private $column=['firstname','lastname','email','message'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=Contact::get();
        return view('layout.messages',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $data = $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'email'=>'required|string',
            'message'=>'required|string',
        ]);
        Mail::to( 'recipient@email.com')->send( new ContactMail($request));
        
        Contact::create($data);
        return redirect()->back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $Contact = Contact::findOrFail($id);
       $Contact->update(['unreadmessage'=>1]);
        return view('layout.ShowMessage', compact('Contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id',$id)->delete();
        return redirect()->route('Messages');
    }
    public function message()
    {
        $msg=Contact::get();
        return  view('includes.nav',compact('msg'));
    }
  
}
