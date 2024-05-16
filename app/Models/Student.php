<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];


    public function  courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'student_courses');
    }
    public function  certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
    public function user(): HasOne
    {
        return $this->HasOne(User::class);
    }
}