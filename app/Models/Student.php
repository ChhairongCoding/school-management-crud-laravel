<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course_id',
        'phone',
        'address',
        'status',
        'image_url'
    ];

    /**
     * A student belongs to one course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
