<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostels extends Model
{     protected $primaryKey = 'H_id';
    protected $fillable = [
        'H_id','user_id', 'address', 'description', 'rent' ,'amenities', 'rules', 'availability','number_beds','vacant_beds','constant_water_supply','private_security','parking_space','caretaker',
    ];

    // Define the inverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
