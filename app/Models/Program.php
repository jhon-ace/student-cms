<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_abbreviation',
        'program_description',
    ];

    
    
}
