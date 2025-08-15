<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'adoption_post_id',
        'user_id',
        'firstName',
        'lastName',
        'email',
        'phone',
        'age',
        'address',
        'city',
        'housingType',
        'ownRent',
        'currentPets',
        'previousPets',
        'reasonForAdoption',
        'veterinaryCare',
        'financialCommitment',
        'agreements',
        'status',
    ];
}
