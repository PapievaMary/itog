<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'id', 'repair', 'work'
      ];

    public function uses(): HasMany 
    {
        return $this->hasMany(Uses::class);  
    }

    public function things(): BelongsToMany
    {
        return $this->BelongsToMany(Thing::class, 'uses' )->withPivot('amount');
    }
}
