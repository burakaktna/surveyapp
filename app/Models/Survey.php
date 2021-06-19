<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    public function semanticSurveyQuestions(): HasMany
    {
        return $this->hasMany(SemanticSurveyQuestion::class, 'semantic_survey_id', 'id');
    }

    public function likertSurveyQuestions(): HasMany
    {
        return $this->hasMany(LikertSurveyQuestion::class, 'likert_survey_id', 'id');
    }

    public function advertisementSurveyQuestions(): HasMany
    {
        return $this->hasMany(AdvertisementSurveyQuestion::class, 'advertisement_survey_id', 'id');
    }

    public function results(): HasMany
    {
        return $this->hasMany(SurveyResult::class);
    }
}
