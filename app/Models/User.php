<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'mongodb';

    protected $collection = 'users';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'email',
        'phone',
        'password',
        'gender',
        'profile_photo',
        'role',
        
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'dob' => 'date',
            'password' => 'hashed',
        ];
    }
}
