<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    use HasFactory;

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    protected $guarded = [];


    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function clicks(): HasMany
    {
        return $this->hasMany(Click::class);
    }

    public function employer():BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}
