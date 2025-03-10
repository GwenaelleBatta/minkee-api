<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fabric extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 'name', 'slug', 'use', 'description', 'image'
    ];
}
