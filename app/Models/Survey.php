<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    public function semanticSurveyQuestions(): HasMany
    {
        return $this->hasMany(SemanticSurveyQuestion::class, 'id', 'semantic_survey_id');
    }

    public function likertSurveyQuestions(): HasMany
    {
        return $this->hasMany(LikertSurveyQuestion::class, 'id', 'likert_survey_id');
    }

    public function results(): HasMany
    {
        return $this->hasMany(SurveyResult::class);
    }
}
