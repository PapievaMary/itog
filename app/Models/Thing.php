<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Thing extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'name', 'description', 'id', 'wrnt', 'master'
    ];

    public function uses(): HasMany 
    {
      return $this->hasMany(Uses::class);
    }

    public function places(): BelongsToMany
    {
      return $this->BelongsToMany(Place::class, 'uses' )->withPivot('amount');
    }

    public function user(): BelongsToMany
    {
      return $this->BelongsToMany(User::class, 'uses' )->withPivot('amount');
    }
}
