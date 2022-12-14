<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'self_introduction',
        'img_name',
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

    public function birth()
    {
        return $this->belongsTo('App\Models\Birth');
    }

    public function birthday()
    {
        return $this->belongsTo('App\Models\Birthday');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
