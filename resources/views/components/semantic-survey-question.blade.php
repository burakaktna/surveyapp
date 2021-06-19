<div class="form-group mb-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <span>{{ $question->question_begin }}</span>

            </div>
            <div class="col-xl-8 d-flex justify-content-center">
                @for($i = 1; $i<=7; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="semantic_question_{{$question->id }}"
                               type="radio"
                               required
                               @if($i === 1) checked @endif
                               name="semantic_{{$question->id }}" value="{{ $i }}"/>
                        <label class="form-check-label"
                               for="semantic_question_{{$question->id }}">{{ $i }}</label>
                    </div>
                @endfor
            </div>
            <div class="col-sm-2">
                <span>{{ $question->question_end }}</span>
            </div>
        </div>
    </div>
</div>
