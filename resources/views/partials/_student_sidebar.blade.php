<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
  <header class="avatar">
    <img src="{{ Storage::url(Auth::user()->avatar)}}">
    <h2>{{ Auth::user()->full_name }}</h2>
  </header>
	<ul>
    <a href="/schedule"><li tabindex="0" class="icon-dashboard {{Request::is('schedule') ? "active" : "" }}"><span>Schedule</span></li></a>
    <a href="{{ route('student.mycourses') }}"><li tabindex="0" class="icon-customers {{ Request::is('MyCourses') ? "active" : "" }}"><span>Courses</span></li></a>
    <a href="{{ route('student.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]) }}"><li tabindex="0" class="icon-users {{Request::is("student/". Auth::user()->id ."/". Auth::user()->slug ) ? "active" : "" }}"><span>Profile</span></li></a>
  </ul>
</nav>