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
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }



}
