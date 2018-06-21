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
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @unless(Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="padding-left:10px">
                        <img src="{{ Storage::url(Auth::user()->avatar)}}" width="26px" height="26px" style="border-radius: 50px; background-color: ghostwhite;">
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::guard('instructor')->check())
                            <li><a href="{{ route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]) }}">My profile</a></li>
                            <li><a href="{{ route('questions.create')}}">Create Questions</a></li>
                            @elseif(Auth::guard('admin')->check())
                            <li><a href="#">Some link</a></li>
                            @else
                            <li>
                                <a href="{{ route('student.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]) }}">
                                    My profile
                                </a>
                            </li>
                                 @if($quizzes->isNotEmpty())
                                     @foreach($quizzes as $quiz)
                                         @can('view', $quiz)
                                            <li>
                                                <a href="{{ route('take.quiz', ['course' => $quiz->course->slug, 'quiz_name' => $quiz->quiz_name])}}">
                                                    Take {{$quiz->course->name}}  Quiz !!
                                                </a>
                                            </li>
                                        @endcan
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
                @endunless
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav nav-pills navbar-nav navbar-right">
            <!-- @if(Auth::guard('web')->check())
                <unread></unread>
              @endif -->
            @if(Auth::guard('instructor')->check())
                <li role="presentation" class="{{Request::is('instructor') ? "active" : "" }}"><a href="/instructor">Home</a></li>
            @elseif (Auth::guard('admin')->check())
                <li role="presentation" class="{{Request::is('manager') ? "active" : "" }}"><a href="/manager">Home</a></li>
            @elseif(Auth::guard('web')->check())
              <li role="presentation" class="{{Request::is('schedule') ? "active" : "" }}"><a href="/schedule">Home</a></li>
            @endif
            </ul>
        </div>
</nav>
