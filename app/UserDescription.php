<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDescription extends Model
{
    protected $fillable = [
        'description_id','user_id', 'gender', 'admission_number' , 'personality', 'describe_yourself',
    ];

    // Define the inverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
