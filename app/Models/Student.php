<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'roll_number',
        'project',
        'marks',
        'percentage',
        'complement',
        'grade'
    ];
}
