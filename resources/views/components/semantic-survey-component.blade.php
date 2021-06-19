<div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
     aria-labelledby="bootstrap-wizard-validation-tab1"
     id="bootstrap-wizard-validation-tab1">
    <h4>{{ $semanticSurvey->name }}</h4>
    <hr>
    @foreach($semanticSurveyQuestions->all() as $question)
        @switch($question->is_reversed)
            @case(true)
            <x-semantic-survey-reversed-question
                :question="$question"
            />
            @break
            @case(false)
            <x-semantic-survey-question
                :question="$question"
            />
            @break
        @endswitch
        <hr>
    @endforeach
</div>
