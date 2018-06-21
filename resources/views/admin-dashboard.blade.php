@extends('admin.layouts.master')

@section('admin.content')
    <div class="panels-flex col-md-9">
        <div class="animated fadeInUp" data-dashboard-panel>
            <div class="panel panel-primary">
                <div class="panel-heading">First Year</div>
                <div class="panel-top">
                    <div class="panel-body">
                        <ul>
                            @if (isset($courses[1]))
                                @foreach ($courses[1] as $course)
                                    <li>
                                        <a href="{{ route('admin.show.course', ['slug' => $course->slug]) }}">{{ $course->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated fadeInUp" data-dashboard-panel>
            <div class="panel panel-primary">
                <div class="panel-heading">Second Year</div>
                <div class="panel-top">
                    <div class="panel-body">
                        <ul>
                            @if (isset($courses[2]))
                                @foreach ($courses[2] as $course)
                                    <li>
                                        <a href="{{ route('admin.show.course', ['slug' => $course->slug]) }}">{{ $course->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated fadeInUp" data-dashboard-panel>
            <div class="panel panel-primary">
                <div class="panel-heading">Third Year</div>
                <div class="panel-top">
                    <div class="panel-body">
                        <ul>
                            @if (isset($courses[3]))
                                @foreach ($courses[3] as $course)
                                    <li>
                                        <a href="{{ route('admin.show.course', ['slug' => $course->slug]) }}">{{ $course->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated fadeInUp" data-dashboard-panel>
            <div class="panel panel-primary">
                <div class="panel-heading">Fourth Year</div>
                <div class="panel-top">
                    <div class="panel-body">
                        <ul>
                            @if (isset($courses[4]))
                                @foreach ($courses[4] as $course)
                                    <li>
                                        <a href="{{ route('admin.show.course', ['slug' => $course->slug]) }}">{{ $course->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
