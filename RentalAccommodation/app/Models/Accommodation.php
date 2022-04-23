<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Booking;
use App\Models\Picture;
use App\Models\Features;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'rooms',
        'description',
        'town',
        'accommodation_type',
        'latitude',
        'longitude',
        'address1',
        'address2',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function pictures() {
        return $this->hasMany(Picture::class);
    }

    public function features() {
        return $this->hasMany(Feature::class);
    }
}
