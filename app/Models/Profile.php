<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'user_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
