@extends('layouts.app')

@section('content')
    <div class="container" id="admin-dashboard-heading">
        <div class="col-md-10 col-md-offset-1">
            <div>
                <h1>Welcome Admin {{ Auth::user()->first_name }}</h1>
                <p>Faculty of {{ Auth::user()->faculty()->first()->name }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                        <a class="button list-group-item {{Request::is('manager') ? "active" : "" }}" href="{{ route('admin.dashboard') }}">Home</a>

                        <a class="button list-group-item {{Request::is("manager/" . Auth::user()->id . "/" . Auth::user()->slug . "/edit") ? "active" : "" }}" href="{{ route('admin.profile.edit', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]) }}">My Profile</a>

                        <a class="button list-group-item {{Request::is('manager/schedules') ? "active" : "" }}" href="{{ route('admin.schedules') }}">Schedules</a>

                        <a class="button list-group-item {{Request::is('manager/course/create') ? "active" : "" }}" href="{{ route('admin.create.course') }}">Create a new course</a>

                        <a class="button list-group-item {{Request::is('manager/mail/class/prepare') ? "active" : "" }}" href="{{ route('admin.prepare.class.mail') }}">Send an Email to a Class</a>

                        <a class="button list-group-item {{Request::is('manager/mail/individual/prepare') ? "active" : "" }}" href="{{ route('admin.prepare.individual.mail') }}">Send an Email to a specific student</a>

                        <a class="button list-group-item {{ Request::is('manager/register/new') ? "active" : "" }}" href="{{ route('admin.register') }}">Create A New Admin Account</a>

                        <a class="button list-group-item {{ Request::is('manager/accounts/deactivated') ? "active" : "" }}" href="{{ route('admin.trashed.accounts') }}">Check Deactivated Admin Accounts</a>
                </ul>
            </div>
            @yield('admin.content')
        </div>
    </div>
@endsection

@section('scripts')
    @yield('admin.scripts')
@endsection
