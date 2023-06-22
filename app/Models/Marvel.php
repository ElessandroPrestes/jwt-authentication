<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marvel extends Model
{
    use HasFactory;

    protected $fillable = ['gender','president','localization'];
    
}
