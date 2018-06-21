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
        @include('partials._navbar')

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

        @if(Auth::guard('instructor')->check())
            @include('partials._instructor_sidebar')
        @elseif(Auth::guard('web')->check()) 
            @include('partials._student_sidebar')
        @endif

        @yield('content')

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
    
    @yield('scripts')
</body>
</html>
