<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'complete_course'
    ];

    public function course(): BelongsTo
    {
        return $this->BelongsTo(Course::class);
    }
    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class);
    }
}