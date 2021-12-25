<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Accommodation;

class Picture extends Model
{
    use HasFactory;

    protected $fillable= [
        'path',
        'ext',
        'description',
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