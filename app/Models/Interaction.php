<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interaction extends Model
{
    use HasFactory, SoftDeletes;

    // Allowed interaction types
    public const TYPES = [
        'Call',
        'Email',
        'Message',
        'Meeting',
        'Interview',
    ];

    // Columns allowed for mass assignment
    protected $fillable = [
        'user_id',
        'recruiter_id',
        'type',
        'interaction_date',
        'summary',
        'got_reply',
    ];

    // Automatically convert date & boolean columns
    protected $casts = [
        'interaction_date' => 'date',
        'got_reply' => 'boolean',
    ];

    // Interaction belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Interaction belongs to one recruiter
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }
}