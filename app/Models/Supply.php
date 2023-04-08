<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supply extends Model
{
    protected $fillable = ['id', 'name', 'color', 'slug', 'pictures', 'quantity', 'number', 'tint', 'category', 'width', 'user_id', 'typesupply_id'];
    protected $with = ['type'];

    use HasFactory, SoftDeletes;

    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeSupply::class, 'typesupply_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
