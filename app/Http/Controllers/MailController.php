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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $mails = Mail::where('user_destination_id', auth()->user()->id)
                ->latest()
                ->paginate();
        
        return view('mails.index',[
            'mails' => $mails,
            ''
        ]);
    }
    public function enviados()
    {   
        $mails = Mail::where('user_id', auth()->user()->id)
                ->latest()
                ->paginate();
        return view('mails.enviados',[
            'mails' => $mails,
            ''
        ]);
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
        $importante = false;
        if($request->importante != null){
            $importante = true;
        }
        Mail::create([
            'asunto' => $validatedData['subject'],
            'contenido' => $validatedData['content'],
            'user_id' => auth()->user()->id,
            'user_destination_id' => User::where('email', $validatedData['email'])->first()->id,
            'importante' => $importante,
            'visto' => false
            
        ]);
    
        return redirect()->route('home')->with('status', "Mail enviado con éxito.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mail $mail)
    {
        return view('mails.show',[
            'mail' => $mail,
        ]);
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
    public function visto( Mail $mail)
    {
        $oldmail = $mail;
        $mail['visto'] = 1;
        $oldmail->update([
            'asunto' => $mail['asunto'],
            'contenido' => $mail['contenido'],
            'user_id' => $mail['user_id'],
            'user_destination_id' => $mail['user_destination_id'],
            'importante' => $mail['importante'],
            'visto' => true
        ]);
        return redirect()->route('bandeja.show',$mail);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
