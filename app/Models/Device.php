<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function getDevicesByPerson($personId)
    {
        return $this->where('person_id', $personId)->get();
    }

}
