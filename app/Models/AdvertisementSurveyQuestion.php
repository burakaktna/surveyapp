<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertisementSurveyQuestion extends Model
{
    use SoftDeletes;

    public function answers(): MorphMany
    {
        return $this->morphMany(QuestionAnswer::class, 'questionable');
    }
}
