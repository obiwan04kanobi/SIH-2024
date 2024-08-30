<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'notifications';

    // The attributes that are mass assignable
    protected $fillable = [
        'message',
        'type',
        'url',
    ];
    
    // Optionally, specify any additional properties or methods
}