<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\Picture;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'password',
        'email',
        'gender',
        'phone',
        'last_ip',
        'last_login'
    ];


    public function accommodations() {
        return $this->hasMany(Accommodation::class);
    }
    
    public function booking() {
        return $this->hasOne(Booking::class);
    }

    public function picture() {
        return $this->hasOne(Picture::class);
    }

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
