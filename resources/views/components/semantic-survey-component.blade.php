<div class="row row-sm">

    @foreach($semanticSurveyQuestions->all() as $question)
        @switch($question->is_reversed)
            @case(true)
            <div class="col-md-12">
                <x-semantic-survey-reversed-question
                    :question="$question"
                />
            </div>
            @break
            @case(false)
            <div class="col-md-12">
                <x-semantic-survey-question
                    :question="$question"
                />
            </div>
            @break
        @endswitch
        <hr>
    @endforeach
</div>
