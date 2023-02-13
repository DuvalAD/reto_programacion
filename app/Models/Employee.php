<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // protected $table = 'employees';

    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'identification',
        'first_name',
        'last_name',
        'email',

        'birth_date',
        'direction',
        'phone_number',

        'vaccinated',
        //'vaccine_fk',
        'vaccinated_date',
        'number_dose',
        'status',
        'user_fk',
    ];

}
