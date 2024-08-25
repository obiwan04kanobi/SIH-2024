<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class About_Scheme extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'about_scheme'; // Specify your collection name

    protected $fillable = [
        'desc',
        'url', // Field to store URL
    ];
}
