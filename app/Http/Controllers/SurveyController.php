<?php

namespace App\Http\Controllers;

use App\Jobs\CalculateFactorResultsJob;
use App\Models\AdvertisementSurveyQuestion;
use App\Models\LikertSurveyQuestion;
use App\Models\Participant;
use App\Models\SemanticSurveyQuestion;
use App\Models\Survey;
use Crypt;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function store(Request $request): string
    {
        $participant = Participant::create();
        $seenAdId = Crypt::decryptString($request->seen_ad);
        $participant->seenAd()->create([
            'advertisement_id' => $seenAdId
        ]);


        $this->storeSemanticQuestionAnswers($request, $participant);
        $this->storeLikertQuestionAnswers($request, $participant);
        $this->storeAdvertisementQuestionAnswers($request, $participant);

        CalculateFactorResultsJob::dispatch($participant);

        return redirect()->route('thank_you');
    }

    private function storeSemanticQuestionAnswers(Request $request, Participant $participant): void
    {
        $questionPoints = collect();
        SemanticSurveyQuestion::each(function (SemanticSurveyQuestion $semanticSurveyQuestion) use ($request, $participant, $questionPoints) {
            $questionPoint = $request->get('semantic_' . $semanticSurveyQuestion->id);
            $questionPoints->push($questionPoint);
            if (is_null($questionPoint)) {
                $participant->delete();
                abort('500', 'Sistemde bir hata oluştu. Eğer tüm soruları yanıtladıysanız yönetici ile iletişime geçip 618 kodunu paylaşın.');
            }
            $semanticSurveyQuestion->answers()->create([
                'participant_id' => $participant->id,
                'point' => $questionPoint
            ]);
        });

        $participant->surveyResults()->create([
            'survey_id' => Survey::whereType('semantic')->firstOrFail()->id,
            'average_point' => $questionPoints->average()
        ]);
    }

    private function storeLikertQuestionAnswers(Request $request, Participant $participant): void
    {
        $questionPoints = collect();
        LikertSurveyQuestion::each(function (LikertSurveyQuestion $likertSurveyQuestion) use ($request, $participant, $questionPoints) {
            $questionPoint = $request->get('likert_' . $likertSurveyQuestion->id);
            $questionPoints->push($questionPoint);
            if (is_null($questionPoint)) {
                $participant->delete();
                abort('500', 'Sistemde bir hata oluştu. Eğer tüm soruları yanıtladıysanız yönetici  ile iletişime geçip 816 kodunu paylaşın.');
            }
            $likertSurveyQuestion->answers()->create([
                'participant_id' => $participant->id,
                'point' => $questionPoint
            ]);
        });

        $participant->surveyResults()->create([
            'survey_id' => Survey::whereType('likert')->firstOrFail()->id,
            'average_point' => $questionPoints->average()
        ]);
    }

    private function storeAdvertisementQuestionAnswers(Request $request, Participant $participant): void
    {
        $questionPoints = collect();
        AdvertisementSurveyQuestion::each(function (AdvertisementSurveyQuestion $advertisementSurveyQuestion) use ($request, $participant, $questionPoints) {
            $questionPoint = $request->get('advertisement_' . $advertisementSurveyQuestion->id);
            $questionPoints->push($questionPoint);
            if (is_null($questionPoint)) {
                $participant->delete();
                abort('500', 'Sistemde bir hata oluştu. Eğer tüm soruları yanıtladıysanız yönetici ile iletişime geçip 912 kodunu paylaşın.');
            }
            $advertisementSurveyQuestion->answers()->create([
                'participant_id' => $participant->id,
                'point' => $questionPoint
            ]);
        });
        $participant->surveyResults()->create([
            'survey_id' => Survey::whereType('advertisement')->firstOrFail()->id,
            'average_point' => $questionPoints->average()
        ]);
    }
}
