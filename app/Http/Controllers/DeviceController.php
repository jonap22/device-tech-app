<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        // Define the validation rules
//        $rules = [
//            'mac_address' => [
//                'required',
//                'regex:/^[0-9A-Fa-f]{2}(\.[0-9A-Fa-f]{2}){5}$/i', // Validates MAC address format
//                Rule::unique('devices', 'mac_address'), // Validates uniqueness in the 'devices' table
//            ],
//            'type' => 'required',
//            'name' => 'required',
//            'person_id' => 'required|exists:people,id', // Assumes 'people' table and 'id' column
//            // Add more validation rules for other fields as needed
//        ];

        // Validate the incoming request with the defined rules
//        $request->validate($rules);

        // Create the Device instance
        $device = new Device([
            'mac_address' => $request->input('mac_address'),
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'person_id' => $request->input('person_id'),
            // Add more fields as needed
        ]);

        // Save the device to the database
        $device->save();

        // Redirect or return a response as needed
    }


    public function index()
    {
        $devices = Device::all();

        return view('devices.index', ['devices' => $devices]);
    }

    public function create()
    {
        $people = Person::all(); // Fetch all people from the database

        return view('devices.create', ['people' => $people]);
    }
}

