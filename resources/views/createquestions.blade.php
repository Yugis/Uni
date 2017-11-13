@extends('layouts.app')

@section('content')

  <div class="containter">
    <div class="create-flex">
      <div class="col-md-5">
        <div class="panel panel-default">
          <form method="POST">
            {{ csrf_field() }}
            <div class="panel-body">
              <div class="form-group">
                <label for="questionTitle">Create A New Question</label>
                  <input type="text" name="questionTitle" class="form-control" value="{{ old('questionTitle') }}" placeholder="E.g: Where are the apples?" autofocus>
                  <div class="col-md-11">
                    <input type="text"  name="option_1" value="{{ old('option_1') }}" class="form-control" placeholder="First Option">
                  </div>
                    <input type="radio" name="correct_answer" value="option_1" style="float:right;">
                  <div class="col-md-11">
                    <input type="text"  name="option_2" value="{{ old('option_2') }}" class="form-control" placeholder="Second Option">
                  </div>
                    <input type="radio" name="correct_answer" value="option_2" style="float:right;">
                  <div class="col-md-11">
                    <input type="text"  name="option_3" value="{{ old('option_3') }}" class="form-control" placeholder="Third Option">
                  </div>
                    <input type="radio" name="correct_answer" value="option_3" style="float:right;">
                  <div class="col-md-11">
                    <input type="text"  name="option_4" value="{{ old('option_4') }}" class="form-control" placeholder="Fourth Option">
                  </div>
                    <input type="radio" name="correct_answer" value="option_4" style="float:right;">
                    @if ($errors->has('correct_answer'))
                      <div class="has-error">
                        <span class="help-block">
                            <strong>Please Select An Option To Be The Correct Answer</strong>
                        </span>
                      </div>
                    @endif
                  <div>
                    <label for="course_name">Which Course Would You Like To Associate This Question To?</label>
                    <select type="select" class="form-control" name="course_id" required>
                     <option value="" disabled selected>Please select the course</option>
                       @foreach ($courses as $key => $value) {
                         <option value="{{ $key }}">{{ $value }}</option>
                       @endforeach
                   </select>
                 </div>
              </div>
              <input type="submit" value="Submit" class="btn btn-success">
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection
