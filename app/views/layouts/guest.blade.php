<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home Work Simple</title>
    <meta name="description" content="">
    {{ HTML::style('assets/css/smoothness/jquery-ui-1.10.3.custom.css') }}
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::script('assets/js/jquery-ui-1.10.3.custom.js') }}
    {{ HTML::script('assets/js/angular.min.js') }}
</head>
<body class="scrolled">
    <div class="col-md-4 col-md-offset-3">
            @section('nav')
                <nav class="navbar" role="navigation">
                    <a class="navbar-brand" href="#">HWS</a>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="divider"></li>
                        <li><a href="#">Home</a></li>
                    </ul>
                </nav>
            @show 

            <div>
                @yield('content')    
            </div>
            
    </div>

    <footer>

    
    </footer>
</body>
</html>