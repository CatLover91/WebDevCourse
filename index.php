<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nicholai Goodall // Portfolio</title>
      
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
      
    <link rel="shortcut icon" href="img/N.ico" type="image/x-icon" />

    <!-- Custom styles for this template -->
    <link href="css/default.css" rel="stylesheet">
      
    <!-- Google Font: Lobster -->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
      
    <!-- Google Font: Ubuntu -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  </head>
  <body>
      
    <!--
    =====================================================================================================
                                                  Nav Bar
    =====================================================================================================
    -->
    <div class="fixed">
        <nav class="top-bar" data-topbar role="navigation">
          <ul class="title-area">
            <li class="name">
              <h1><a href="http://www.nichol.ai" id="name">N</a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar"><a href="#"><span id="connect">connect</span></a></li>
          </ul>

          <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
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

            <u1 class="left">
              <!-- Empty right now -->
            </u1>
          </section>
        </nav>
    </div>
    
      
    <!--
    =====================================================================================================
                                                 Splash
    =====================================================================================================
    -->
    <div class="parallax-background">
      <div class="intro-text">
        <h1>Q & A</h1>
        <h2>Nicholai Goodall</h2>
      </div>
    </div>
      
    
    
    

    <!--
    ============================================================================
                                    Main Block
    ============================================================================
    -->
    <div class="parallax-content" id="adjust-padding">
      <p><a href="http://github.com/catlover91/ODUCS418">Github Repo</a><br/>You can find the code for this website here.</p>
      <div class="row">
        <?php
          include_once "server.php";
        ?>
      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
