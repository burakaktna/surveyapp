<?php

namespace App\Jobs;

use App\Models\Factor;
use App\Models\LikertSurveyQuestion;
use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CalculateFactorResultsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Participant $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function handle(): void
    {
        foreach (Factor::all() as $factor) {
            $participantFactorAnswerPoints = collect();
            foreach ($factor->questions as $question) {
                $questionAnswer = $this->participant->questionAnswers
                    ->where('questionable_type', LikertSurveyQuestion::class)
                    ->where('questionable_id', $question->likert_survey_question_id)
                    ->first();
                $participantFactorAnswerPoints->push($questionAnswer->point);
            }
            $this->participant->factorResults()->create([
                'factor_id' => $factor->id,
                'average_point' => $participantFactorAnswerPoints->average()
            ]);
        }
    }
}
