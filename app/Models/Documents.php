<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'ispublished'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categorys::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(CoverDocument::class);
    }
}
