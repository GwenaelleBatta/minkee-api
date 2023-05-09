<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesure extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 'name', 'slug', 'outline', 'lenght', 'user_id', 'gender'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
