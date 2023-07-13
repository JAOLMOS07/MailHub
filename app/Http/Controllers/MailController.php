<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\User;
use App\Http\Requests\StoreMailRequest;
use App\Http\Requests\UpdateMailRequest;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return auth()->user()->Mails;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mails.create',[
            'mail' => new Mail,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailRequest $request)
    {
        $validatedData = $request->validated();
        Mail::create([
            'asunto' => $validatedData['subject'],
            'contenido' => $validatedData['content'],
            'user_id' => auth()->user()->id,
            'user_destination_id' => User::where('email', $validatedData['email'])->first()->id,
            'importante' => false
            
        ]);
    
        return redirect()->route('home')->with('status', "Mail enviado con éxito.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mail $mail)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMailRequest $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
