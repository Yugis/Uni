@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row dashboard-flex">
        <div class="col-md-10">
            <div class="panel panel-danger animated fadeInDown">
                <div class="panel-heading">Welcome instructor {{Auth::user()->last_name}}, we hope you're doing fine</div>

                <div class="panel-body">
                    Instructor Dashboard
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row panels-flex">
		<div class="first-panel animated fadeInLeft">
			<div class="panel panel-danger">
				<div class="panel-heading">Instructors</div>
          <div class="panel-top" id="panel-top">
  					<div class="panel-body" id="panel-body">
  						Want to check on the profiles of other instructors?
  					  <br>
            </div>
            <div>
              <a class="templinks" href="{{ route('all.instructors') }}">View All Instructors</a>
            </div>
          </div>

  		</div>
		</div>
			<div class="second-panel animated fadeInUp">
				<div class="panel panel-danger">
					<div class="panel-heading">Schedule</div>
          <div class="panel-top" id="panel-top">
						<div class="panel-body" id="panel-body">
							Would you like to check on your schedule for today?
							<br>
            </div>

            <div>
							<a class="templinks" href="{{ route('instructor.schedule') }}">My Schedule</a>
            </div>
          </div>
				</div>
			</div>


				<div class="third-panel animated fadeInRight">
					<div class="panel panel-danger">
						<div class="panel-heading">Students</div>
            <div class="panel-top" id="panel-top">
							<div class="panel-body" id="panel-body">
								You can check on all of the students from here
								<br>
              </div>
              <div>
    						<a class="templinks" href="{{ url('students') }}">View All Students</a>
              </div>
            </div>
					</div>
				</div>
	</div>
</div>

@endsection
