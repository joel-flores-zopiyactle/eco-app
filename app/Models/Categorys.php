<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorys extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];



    public function document(): BelongsToMany
    {
        return $this->belongsToMany(Categorys::class);
    }
}
