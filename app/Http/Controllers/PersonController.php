<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();

        return view('people.index', ['people' => $people]);
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required|unique:people',
            'email' => 'required|unique:people',
        ]);

        $encryptedEmail = Crypt::encryptString($request->input('email'));

        $person = new Person([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'id_number' => $request->input('id_number'),
            'email' => $encryptedEmail,
        ]);

        $person->save();

        return redirect()->route('people.index')->with('success', 'Person created successfully');
    }

    public function show($id)
    {
        $person = Person::findOrFail($id); // Find the person by ID

        // Decrypt the email address for display
        $decryptedEmail = Crypt::decryptString($person->email);

        return view('people.show', ['person' => $person, 'decryptedEmail' => $decryptedEmail]);
    }



}
