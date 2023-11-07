<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilesDocument extends Model
{
    use HasFactory;

    public function document(): BelongsTo
    {
        return $this->belongsTo(Documents::class);
    }
}
