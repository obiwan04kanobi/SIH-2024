<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_Scheme extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'about_schemes';

    // The attributes that are mass assignable
    protected $fillable = [
        'description',
        'url',
    ];

    // Optionally, specify any additional properties or methods
}