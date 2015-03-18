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
    <div class="navbar navbar-default navbar-fixed-top color-box ">
        <nav class="top-bar" data-topbar role="navigation">
          <div class="navbar-header name">
              <h1><a href="http://www.nichol.ai" id="portfolio-link">N</a></h1>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <!-- Right Nav Section -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <label>connect</label>
                    <span class="fa fa-lg fa-anchor"></span> 
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="http://github.com/catlover91" title="Github"><i class="fa fa-2x fa-github"></i></a></li>
                  <li><a href="http://twitter.com/me0wmixgg" title="Twitter"><i class="fa fa-2x fa-twitter"></i></a></li>
                  <li>
                    <a href="http://about.me/kranoscorp" title="About.me">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <strong class="fa-stack-1x about-me-text">Me</strong>
                      </span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
        </nav>
    </div>
      @yield('content')
  </body>
</html>