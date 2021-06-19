<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FactorQuestion extends Model
{
    public function likertSurveyQuestion(): BelongsTo
    {
        return $this->belongsTo(LikertSurveyQuestion::class);
    }
}
