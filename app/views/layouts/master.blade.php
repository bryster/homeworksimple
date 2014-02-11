<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home Work Simple</title>
    <meta name="description" content="">
    {{ HTML::style('assets/css/smoothness/jquery-ui-1.10.3.custom.css') }}
    {{ HTML::style('assets/css/datepicker.css') }}
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::script('assets/js/jquery-2.1.0.min.js') }}
    {{ HTML::script('assets/js/jquery-ui-1.10.3.custom.js') }}
    {{ HTML::script('assets/js/angular.min.js') }}
    {{ HTML::script('assets/js/bootstrap-datepicker.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
</head>
<body class="scrolled">
    <div class="col-md-9 col-md-offset-2">
            @section('nav')
                <nav class="navbar" role="navigation">
                    <a class="navbar-brand" href="#">HWS</a>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="divider"></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="tasks">Tasks</a></li>
                        <li><a href="{{ Session::get('username'); }}">Profile</a></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </nav>
            @show 

            <div class="row">
                @yield('content')
            </div>
            
    </div>

    <footer>

    
    </footer>
</body>
</html>
<script type="text/javascript">
$('.datepicker').datepicker();

$( "#toggle" ).click(function() {
  $( "#show_comments" ).toggle( "slow" );
});

</script>