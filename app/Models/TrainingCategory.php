<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function images()
    {
        return $this->hasMany(TrainingImage::class);
    }
    public function courses()
{
    return $this->hasMany(Course::class, 'training_category_id');
}
}

