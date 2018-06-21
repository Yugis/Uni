<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
  <header class="avatar">
    <img src="{{ Storage::url(Auth::user()->avatar) }}">
    <h2>{{ Auth::user()->full_name }}</h2>
  </header>
	<ul>
    <a href="{{ route('instructor.dashboard') }}"><li tabindex="0" class="icon-dashboard {{Request::is('instructor/schedule') ? "active" : "" }}"><span>Schedule</span></li></a>
    <a href="{{ route('instructor.mycourses') }}"><li tabindex="0" class="icon-customers {{ Request::is('instructor/MyCourses') ? "active" : "" }}"><span>Courses</span></li></a>
    <a href="{{ route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]) }}"><li tabindex="0" class="icon-users {{Request::is("instructor/". Auth::user()->id ."/". Auth::user()->slug . "/edit" ) ? "active" : "" }}"><span>Profile</span></li></a>
    <a href="{{ route('instructor.prepare.class.mail') }}"><li tabindex="0" class="icon-email {{Request::is('instructor/mail/class/prepare') ? "active" : "" }}"><span>Send Email to Class</span></li></a>
  </ul>
</nav>