<div class="row row-sm">

    @foreach($advertisementSurveyQuestions->all() as $question)
        @switch($question->is_reversed)
            @case(true)
            <div class="col-md-12">
                <x-advertisement-survey-reversed-question
                    :question="$question"
                />
            </div>
            @break
            @case(false)
            <div class="col-md-12">
                <x-advertisement-survey-question
                    :question="$question"
                />
            </div>
            @break
        @endswitch
        <hr>
    @endforeach
</div>
