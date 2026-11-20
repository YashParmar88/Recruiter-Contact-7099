<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruiter extends Model
{
    use HasFactory, SoftDeletes;

    // Allowed source options
    public const SOURCES = [
        'LinkedIn',
        'Placement Cell',
        'Referral',
        'Job Fair',
        'Other',
    ];

    // Allowed status options
    public const STATUSES = [
        'New',
        'Active',
        'Cold',
    ];

    // Columns allowed for mass assignment
    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'email',
        'phone',
        'designation',
        'linkedin_url',
        'city',
        'source',
        'status',
        'notes',
    ];

    // Recruiter belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Recruiter optionally belongs to one company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Recruiter has many interactions
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
}