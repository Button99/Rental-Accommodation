<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Accommodation;

class Feature extends Model
{
    use HasFactory;

    protected $fillable= [
        'pool',
        'bbq',
        'pool_table',
        'wifi',
        'tv',
        'kitchen',
        'parking',
        'air_conditioning',
        'washer',
        'fire_extinguisher',
        'smoke_alarm',
    ];

    public function accommodation() {
        return $this->belongsTo(Accommodation::class);
    }
}
