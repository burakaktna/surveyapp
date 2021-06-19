<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswer extends Model
{
    use SoftDeletes;

    protected $fillable = ['participant_id', 'point'];

    public function questionable(): MorphTo
    {
        return $this->morphTo();
    }
}
