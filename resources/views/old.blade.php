<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>A-Y-Academy | Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                /*background: linear-gradient(to top, #33ccff 0%, #ff99cc 100%);*/
                background: linear-gradient(to bottom, #200122, #6f0000);
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ff0066;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: red;
                font-size: 100px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    @if (Auth::guard('instructor')->check())
                      <a href="{{ url('/instructor') }}">Dashboard</a>
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ url('/home') }}">Home</a>
                  @else
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 20px">

                          <li class="dropdown links">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/login') }}">As a Student</a></li>
                              <li><a href="{{ route('instructor.login') }}">As an Instructor</a></li>
                            </ul>
                          </li>

                          <li class="dropdown links">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register<span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/register') }}">As a Student</a></li>
                              <li><a href="{{ route('instructor.submit.register') }}">As an Instructor</a></li>
                            </ul>
                          </li>

                        </ul>
                    @endif
                </div>
            <div class="content animated fadeInUp">
                <div class="title m-b-md">
                    Akhbar El Youm Academy
                </div>

                <div class="links">

                    <h2 style="color: #ff0066; font-family: monospace; font-style: italic; font-weight: lighter;">"Excellency & Innovation"</h2>
                </div>
            </div>
        </div>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
