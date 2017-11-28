@extends('layouts.app')

@section('content')

  <div class="containter">
    <div class="create-flex">
      <div class="col-md-5">
        <form method="POST">
          {{ csrf_field() }}
          <div class="panel panel-danger">
            <div class="panel-heading">
              Create A New Question
            </div>
              <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="questionTitle" class="form-control" value="{{ old('questionTitle') }}" placeholder="E.g: Where are the apples?" autofocus required>
                    <div class="col-md-11">
                      <input type="text"  name="option_1" value="{{ old('option_1') }}" class="form-control" placeholder="First Option" required>
                    </div>
                      <input type="radio" name="correct_answer" value="option_1" style="float:right;">
                    <div class="col-md-11">
                      <input type="text"  name="option_2" value="{{ old('option_2') }}" class="form-control" placeholder="Second Option" required>
                    </div>
                      <input type="radio" name="correct_answer" value="option_2" style="float:right;">
                    <div class="col-md-11">
                      <input type="text"  name="option_3" value="{{ old('option_3') }}" class="form-control" placeholder="Third Option" required>
                    </div>
                      <input type="radio" name="correct_answer" value="option_3" style="float:right;">
                    <div class="col-md-11">
                      <input type="text"  name="option_4" value="{{ old('option_4') }}" class="form-control" placeholder="Fourth Option" required>
                    </div>
                      <input type="radio" name="correct_answer" value="option_4" style="float:right;">
                      {{-- @if ($errors->has('correct_answer'))
                        <div class="has-error">
                          <span class="help-block">
                              <strong>Please Select An Option To Be The Correct Answer</strong>
                          </span>
                        </div>
                      @endif --}}
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
                @if($errors->count() > 0)
                  @foreach ($errors->all() as $error)
                    <div class="has-error">
                      <span class="help-block">
                        <strong> {{ ucfirst($error) }} </strong>
                      </span>
                    </div>
                  @endforeach
                @endif
                <input type="submit" value="Submit" class="btn btn-success">
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
