<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPhoneMail;



class PhoneController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $phones = Phone::all();
        return view("phones.index", compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
            return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
   
    $request->validate([
        'phone_name' => 'required',
        'brand' => 'required',
        'price' => 'required|numeric'
    ]);


    $phone = Phone::create([
        'phone_name' => $request->phone_name,
        'brand' => $request->brand,
        'price' => $request->price
    ]);

 
    $emails = ['voidfujin@gmail.com','brucejumamoy@gmail.com','gojay122@gmail.com','marklloydaleria@gmail.com'];
    Mail::to($emails)->send(new NewPhoneMail($phone));

    return redirect()->route('phones.index')->with('success','Phone Added and Users Notified');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $phone = Phone::findOrFail($id);
        return view('phones.edit', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     */
      public function update(Request $request, Phone $phone)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric'
        ]);

        $phone->update($request->all());

        return redirect()->route('phones.index')->with('success', 'Phone updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          $phone = Phone::findOrFail($id);
          $phone->delete();
        return redirect()->route('phones.index')->with('success', 'Phone deleted!');
    }
}
