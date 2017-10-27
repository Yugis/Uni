@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row dashboard-flex">
        <div class="col-md-10">
            <div class="panel panel-danger animated fadeInDown">
                <div class="panel-heading">Welcome {{ Auth::user()->first_name}}, we hope you're doing fine</div>

                <div class="panel-body">
                    Welcome to Akhbar El Youm Academy's official website, here you will find information about your <span style="color:brown">Instructors</span>, <span style="color:brown">Courses</span> and other <span style="color:brown">Students</span>.
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
  						Trying to find out where you can find your instructor? Never been easier, check out their schedule here.
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
					<div class="panel-heading">Courses</div>
          <div class="panel-top" id="panel-top">
						<div class="panel-body" id="panel-body">
							Wondering what is your schedule today? as easy as pie!
							<br>
            </div>

            <div>
							<a class="templinks" href="{{ route('student.mycourses') }}">View My Courses</a>
            </div>
          </div>
				</div>
			</div>


				<div class="third-panel animated fadeInRight">
					<div class="panel panel-danger">
						<div class="panel-heading">Students</div>
            <div class="panel-top" id="panel-top">
							<div class="panel-body" id="panel-body">
								Now you can click here to view your fellow classmates sorted by their faculty
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
