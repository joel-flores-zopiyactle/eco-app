<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categorys::class);
    }
}
