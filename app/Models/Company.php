<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    // Columns allowed for mass assignment (create/update)
    protected $fillable = [
        'user_id',
        'name',
        'city',
        'website',
        'notes',
    ];

    // Company belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Company has many recruiters
    public function recruiters()
    {
        return $this->hasMany(Recruiter::class);
    }
}