<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PlanStep extends Model
{
    use HasFactory;
    protected $table = 'plan_step';

    protected $fillable = [
        'id',
        'order',
        'precision',
        'id',
        'plan_id',
    ];

    public function checks(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'checksteps', 'planstep_id', 'user_id');
    }
}

