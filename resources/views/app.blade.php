<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nicholai Goodall // CS418 Web Development Project</title>
      
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
      
    <link rel="shortcut icon" href="{{ asset('N.ico') }}" type="image/x-icon" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    
    <!-- Google Font: Lobster -->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
      
    <!-- Google Font: Ubuntu -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
      
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body>
      
    <!--
    =====================================================================================================
                                                  Nav Bar
    =====================================================================================================
    -->
    <div class="navbar navbar-default navbar-fixed-top">
        <nav class="top-bar" data-topbar role="navigation">
          <div class="navbar-header name">
              <h1><a href="http://www.nichol.ai" id="portfolio-link">N</a></h1>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <!-- Right Nav Section -->
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    @include('profile.light', ['user' => Auth::user()])
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="container-fluid">
      <div class="span2">
        @include('slider.left', ['previous' => $leftConnector])
    </div>
        <div class="span8">
            @yield('content')
        </div>
        <div class="span2">
            @include('slider.right')
        </div>
      </div>
  </body>
</html>