@extends('layouts.app')

@section('content')
  <div class="create-flex">
    <div class="col-md-6">
      <form method="POST">
        {{ csrf_field() }}
        <div class="panel panel-danger">
          <div class="panel-heading">
            Create A New Quiz For Your Students Here.
          </div>
          <div class="panel-body">
            <div class="flex-align-baseline">
              <h4>Choose From Existing Questions <a href="{{ route('questions.create') }}">or create new questions.</a></h3>
            </div>
            <hr>
            <ul>
              @forelse($questions as $index => $question)
                <div class="flex-align-baseline">
                  <li> {{$index}}  {{ $question->title }} </li>
                  <input type="checkbox" name="id[]" value="{{ $question->id }}">
                </div>
                <hr>
              @empty
              </ul>
              There are no questions yet, <a href="{{ route('questions.create')}}">create some?</a>
            @endforelse

            <input type="submit" class="btn btn-success" value="Create Quiz">
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
