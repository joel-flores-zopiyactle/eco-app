<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CoverDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'file',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Documents::class);
    }
}
