<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">



    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                      {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle notificaiton"  data-toggle="dropdown" role="button" aria-expanded="false">
                               Notifications
                                <span id="count">{{ count(Auth::user()->unreadNotifications) }}</span>
                                 <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" id="showNofication">
                                @foreach(Auth::user()->notifications as $note)
                                    <li>
                                        <a href="" class="{{ $note->read_at == null ? 'unread' : '' }}">
                                                Instructor {!! $note->data['instructor'] !!} has created a new post {!! $note->data['body'] !!}
                                        </a>
                                    </li>
                              @endforeach --}}
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>

                              <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/login') }}">As a Student</a></li>
                                <li><a href="{{ route('instructor.login') }}">As an Instructor</a></li>
                              </ul>
                            </li>

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register<span class="caret"></span></a>

                              <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/register') }}">As a Student</a></li>
                                <li><a href="{{ route('instructor.submit.register') }}">As an Instructor</a></li>
                              </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="padding-left:10px">
                                <img src="{{ Storage::url(Auth::user()->avatar)}}" width="26px" height="26px" style="border-radius: 50px; background-color: ghostwhite;">
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>


                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::guard('instructor')->check())
                                    <li><a href="{{ route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]) }}">My profile</a></li>
                                    <li><a href="{{ route('questions.create')}}">Create Questions</a></li>
                                    @else
                                    <li><a href="{{ route('student.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]) }}">My profile</a></li>
                                         @if($quizzes->isNotEmpty())
                                             @foreach($quizzes as $quiz)
                                                <li><a href="{{ route('take.quiz', ['course' => $quiz->course->slug, 'quiz_name' => $quiz->quiz_name])}}">Take {{$quiz->course->name}}  Quiz !!</a></li>
                                            @endforeach
                                        @endif
                                    @endif
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav nav-pills navbar-nav navbar-right">
                    <!-- <li role="presentation" class="{{Request::is('create.course') ? "active" : "" }}"><a href="/create.course">Create Course</a></li>
                    <li role="presentation" class="{{Request::is('create.faculty') ? "active" : "" }}"><a href="/create.faculty">Create Faculty</a></li> -->
                    <!-- @if(Auth::check())
                      @if(Auth::guard('web')->check())
                        <unread></unread>
                      @endif

                      <li role="presentation" class="{{Request::is('home') ? "active" : "" }}"><a href="/home">Home</a></li>
                    @endif -->
                    </ul>
                </div>
            </div>
        </nav>

    		@if ($flash = session('success'))
    			<div id="flash-success" class="alert alert-success animated fadeInUp" role="alert">
    				{{ $flash }}
    			</div>
    		@endif

        @if ($flash = session('fail'))
    			<div id="flash-fail" class="alert alert-danger animated lightSpeedIn" role="alert">
    				{{ $flash }}
    			</div>
    		@endif

        @yield('content')

        <!-- @if(Auth::guard('web')->check())
        <notification :id="{{ Auth::user()->id }}" ></notification>
        <audio id="notification_audio">
          <source src="{{ asset('audio/audio.mp3') }}">
        </audio>
        @endif -->

	</div>
    <!-- Scripts -->
    <script src="{{ elixir('js/app.js') }}"></script>
  	<script>
      $('#flash-success').delay(2500).fadeIn("slow", function() {
        $(this).removeClass('animated fadeInUp');
        $(this).addClass('animated fadeOutDown');
        $(this).fadeOut();
      });
  	</script>
</body>
</html>
