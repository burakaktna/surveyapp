<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
