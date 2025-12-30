<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'price',
        'image_url',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Add this method
    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }
}
