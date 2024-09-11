<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Uses extends Model
{
    use HasFactory;

    protected $fillable = [
        'thing_id',
        'place_id',
        'user_id',
        'amount',
    ];

    public function thing(): BelongsTo {
        return $this->belongsTo(Thing::class);
    }

    public function place(): BelongsTo {
        return $this->belongsTo(Place::class);
    }
    
}
