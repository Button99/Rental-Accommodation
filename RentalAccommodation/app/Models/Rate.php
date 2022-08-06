<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable= [
        'accommodation_id',
        'rate',
        'total_rate',
        'count',
        'accommodation_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function accommodation() {
        return $this->belongsTo(Accommodation::class);
    }
}
