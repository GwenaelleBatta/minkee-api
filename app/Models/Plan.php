<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    protected $fillable = ['id', 'name', 'base', 'slug', 'min', 'max', 'cut', 'gender', 'images', 'price', 'type', 'keywords', 'supplies', 'user_id', 'level_id'];
    protected $withCount = ['steps'];
    protected $with = ['steps'];
    use HasFactory, SoftDeletes;

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function steps(): BelongsToMany
    {
        return $this->belongsToMany(Step::class, 'plan_step', 'plan_id', 'step_id')->withPivot('order', 'precision', 'id')->orderByPivot('order');
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorite', 'plan_id', 'user_id');
    }
}
