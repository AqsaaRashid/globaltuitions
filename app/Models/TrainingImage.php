<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingImage extends Model
{
    protected $fillable = ['training_category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(TrainingCategory::class);
    }
}

