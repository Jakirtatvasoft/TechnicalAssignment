<?php

namespace App\Models;

use App\Traits\UuidTraits;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UuidTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'uuid'
    ];

     /**
     * Get all of the colors for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function color(): HasMany
    {
        return $this->hasMany(UserColor::class)->orderBy('updated_at','DESC');
    }
}
