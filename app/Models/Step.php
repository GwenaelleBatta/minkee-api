<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    protected $fillable = ['id', 'name', 'description', 'slug', 'image', 'check'];

    use HasFactory, SoftDeletes;

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
    }
}
