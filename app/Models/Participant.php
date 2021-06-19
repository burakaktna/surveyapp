<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Participant extends Model
{
    public function questionAnswers(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function surveyResults(): HasMany
    {
        return $this->hasMany(SurveyResult::class);
    }

    public function factorResults(): HasMany
    {
        return $this->hasMany(FactorResult::class);
    }

    public function seenAd(): HasOne
    {
        return $this->hasOne(AdView::class);
    }
}
