<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'adoption_id',
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

    /**
     * Get the adoption post for this request.
     */
    public function adoptionPost()
    {
        return $this->belongsTo(AdoptionPost::class, 'adoption_id');
    }
}
