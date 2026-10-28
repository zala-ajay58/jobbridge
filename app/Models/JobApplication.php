<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class JobApplication extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'job_applications';

    protected $fillable = [
        'job_id',
        'job_title',
        'company_name',
        'candidate_id',
        'full_name',
        'contact_number',
        'email',
        'resume_path',
        'status',
    ];
}
