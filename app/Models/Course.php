<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'crt_title',
        'crt_header',
        'crt_footer',
        'course_start_date',
        'course_end_date',
    ];

    // protected $casts = [
    //     'courst_start_date' => 'datetime',
    //     'courst_end_date' => 'datetime',
    // ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_courses')
            ->withPivot('complete_course');
    }
    public function certificate(): HasMany
    {
        return $this->HasMany(Certificate::class);
    }
}
