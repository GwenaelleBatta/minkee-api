<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes                                                                    ;

    protected $with = ['supplies', 'mesures', 'plans', 'favorites', 'pictures'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mesures(): HasMany
    {
        return $this->hasMany(Mesure::class);
    }
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }
    public function supplies(): HasMany
    {
        return $this->hasMany(Supply::class);
    }
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }
    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'favorite', 'user_id', 'plan_id');
    }
    public function checks(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'checksteps', 'user_id', 'planstep_id');
    }
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id');
    }

    public function followed(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id');
    }
}
