<?php

namespace App\View\Components;

use App\Models\Survey;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class SemanticSurveyComponent extends Component
{
    public Survey $semanticSurvey;
    public Collection $semanticSurveyQuestions;

    public function __construct()
    {
        $this->semanticSurvey = Survey::where([
            'type' => 'semantic'
        ])->firstOrFail();
        $this->semanticSurveyQuestions = $this->semanticSurvey->semanticSurveyQuestions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.semantic-survey-component');
    }
}
