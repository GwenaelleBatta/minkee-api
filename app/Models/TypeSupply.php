<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeSupply extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'typesupplies';
    protected $fillable = [
        'id', 'name', 'slug'
    ];

    public function supplies(): HasMany
    {
        return $this->hasMany(Supply::class);
    }
}
