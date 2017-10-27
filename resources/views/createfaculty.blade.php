@extends('layouts.app')

@section('content')
    <div class="containter">
      <div class="create-flex">
        <div class="col-md-8">
          <div class="panel panel-default">
            <form method="POST">
                {{ csrf_field() }}
              <div class="panel-body">
                <div class="form-group">
                 <label for="createFaculty">Create Faculty</label>
                 <input type="text" name="createFaculty" class="form-control" placeholder="Faculty Name" autofocus="true">
               </div>
               <input type="submit" value="Submit" class="btn btn-danger">
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <div class="temp">

        @foreach ($faculties as $faculty)
              <ul>
                <li>  {{ $faculty->name }} </li>
              </ul>
        @endforeach

    </div>
@endsection
