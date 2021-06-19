<?php

namespace App\View\Components;

use App\Models\Survey;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class LikertSurveyComponent extends Component
{
    public Survey $likertSurvey;
    public Collection $likertSurveyQuestions;

    public function __construct()
    {
        $this->likertSurvey = Survey::where([
            'type' => 'likert'
        ])->firstOrFail();
        $this->likertSurveyQuestions = $this->likertSurvey->likertSurveyQuestions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.likert-survey-component');
    }
}
