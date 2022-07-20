<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Accommodation;

class Comments extends Model
{
    use HasFactory;

    protected $fillable= [
        'comment',
        'user_id',
        'accommodation_id'
    ];

    public function accommodations() {
        return $this->belongsTo(Accommodation::class);
    }
}
