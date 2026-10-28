<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'companies';

    protected $fillable = [
        'recruiter_id',
        'company_logo',
        'company_name',
        'company_description',
        'industry',
        'company_size',
        'founded_year',
        'website',
        'company_email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'linkedin_url',
    ];
}
