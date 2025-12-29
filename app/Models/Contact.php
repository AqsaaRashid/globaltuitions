<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Contact.php
class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message'];
}

