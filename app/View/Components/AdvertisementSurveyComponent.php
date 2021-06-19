<?php

namespace App\View\Components;

use App\Models\Survey;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class AdvertisementSurveyComponent extends Component
{
    public Survey $advertisementSurvey;
    public Collection $advertisementSurveyQuestions;

    public function __construct()
    {
        $this->advertisementSurvey = Survey::where([
            'type' => 'advertisement'
        ])->firstOrFail();
        $this->advertisementSurveyQuestions = $this->advertisementSurvey->advertisementSurveyQuestions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.advertisement-survey-component');
    }
}
