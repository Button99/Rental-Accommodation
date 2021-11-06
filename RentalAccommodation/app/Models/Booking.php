<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodation;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    protected $fillable= [
        'is_available',
        'persons',
        'start_date',
        'end_date',
        'accommodation_id',
        'user_id'
    ];

    public function accommodation() {
        return $this->belongsTo(Accommodation::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
