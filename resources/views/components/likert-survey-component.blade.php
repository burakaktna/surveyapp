<table class="table table-borderless table-responsive">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Bana çok benziyor</th>
        <th scope="col">Bana benziyor</th>
        <th scope="col">Bana biraz benziyor</th>
        <th scope="col">Bana çok az benziyor</th>
        <th scope="col">Bana benzemiyor</th>
        <th scope="col">Bana hiç benzemiyor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($likertSurveyQuestions->all() as $question)
        <tr>
            <th scope="row">{{ $question->question }}</th>
            <td class="text-center">
                <input class="form-control-input" id="likert_question_{{ $question->id }}"
                       type="radio"
                       required
                       checked
                       name="likert_{{ $question->id }}" value="6"/>
                <label class="form-control-label"
                       for="likert_question_{{ $question->id }}"></label>
            </td>
            <td class="text-center">
                <input class="form-control-input" id="likert_question_{{ $question->id }}"
                       type="radio"
                       required
                       name="likert_{{ $question->id }}" value="5"/>
                <label class="form-control-label"
                       for="likert_question_{{ $question->id }}"></label>
            </td>
            <td class="text-center">
                <input class="form-control-input" id="likert_question_{{ $question->id }}"
                       type="radio"
                       required
                       name="likert_{{ $question->id }}" value="4"/>
                <label class="form-control-label"
                       for="likert_question_{{ $question->id }}"></label>
            </td>
            <td class="text-center">
                <input class="form-control-input" id="likert_question_{{ $question->id }}"
                       type="radio"
                       required
                       name="likert_{{ $question->id }}" value="3"/>
                <label class="form-control-label"
                       for="likert_question_{{ $question->id }}"></label>
            </td>
            <td class="text-center">
                <input class="form-control-input" id="likert_question_{{ $question->id }}"
                       type="radio"
                       required
                       name="likert_{{ $question->id }}" value="2"/>
                <label class="form-control-label"
                       for="likert_question_{{ $question->id }}"></label>
            </td>
            <td class="text-center">
                <input class="form-control-input" id="likert_question_{{ $question->id }}"
                       type="radio"
                       required
                       name="likert_{{ $question->id }}" value="1"/>
                <label class="form-control-label"
                       for="likert_question_{{ $question->id }}"></label>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
