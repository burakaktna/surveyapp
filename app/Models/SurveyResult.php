<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyResult extends Model
{
    protected $fillable = ['survey_id', 'average_point'];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
