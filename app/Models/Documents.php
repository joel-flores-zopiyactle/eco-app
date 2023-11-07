<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'ispublished',
        'cover',
        'file'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categorys::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(CoverDocument::class, 'document_id', 'id');
    }

}
