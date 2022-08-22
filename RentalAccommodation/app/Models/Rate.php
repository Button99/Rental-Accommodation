<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable= [
        'rate',
        'user_id', 
        'accommodation_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function accommodation() {
        return $this->belongsTo(Accommodation::class);
    }
}
