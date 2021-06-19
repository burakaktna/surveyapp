<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FactorResult extends Model
{
    use SoftDeletes;

    protected $fillable = ['factor_id', 'average_point'];

    public function factor(): BelongsTo
    {
        return $this->belongsTo(Factor::class);
    }
}
