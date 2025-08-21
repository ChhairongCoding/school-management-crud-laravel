<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'video_url',
        'order',
    ];

    /**
     * A lesson belongs to one course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
