<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Job extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'jobs';

    protected $fillable = [
        'recruiter_id',
        'company_id',
        'company_name',
        'company_logo',
        'company_industry',
        'company_city',
        'company_website',

        'job_title',
        'job_type',
        'work_mode',
        'location',
        'qualification',
        'experience_min',
        'experience_max',
        'salary_min_lpa',
        'salary_max_lpa',
        'total_vacancies',
        'description',
        'skills',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'experience_min' => 'integer',
            'experience_max' => 'integer',
            'salary_min_lpa' => 'float',
            'salary_max_lpa' => 'float',
            'total_vacancies' => 'integer',
            'skills' => 'array',
        ];
    }
}
