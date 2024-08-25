<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash; // Import the Hash facade
use MongoDB\Laravel\Eloquent\Model;

class Students extends Model
{
    protected $connection = 'mongodb'; // Specify MongoDB connection
    protected $collection = 'students'; // Specify MongoDB collection

    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Verify the password against the hashed password.
     */
    public function verifyPassword($password)
    {
        return Hash::check($password, $this->password);
    }
}
