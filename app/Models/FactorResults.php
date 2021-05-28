<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FactorResults extends Model
{
    use SoftDeletes;

    public function factor(): BelongsTo
    {
        return $this->belongsTo(Factor::class);
    }
}
