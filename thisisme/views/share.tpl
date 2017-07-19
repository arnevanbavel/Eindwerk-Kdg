<!DOCTYPE html>
<html lang="en">

<head>
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="THIS IS ME" />
    <meta property="og:description"   content="[@profiel_aboutMe]" />

    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Visit</title>

    <!-- Standard css -->
    <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
    <link href="./assets/css/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="./assets/css/global2.css" rel="stylesheet">
    <link href="./assets/css/mypage.css" rel="stylesheet">
    <link href="[@headerCSS]" rel="stylesheet">
    <link href="[@profielCSS]" rel="stylesheet">
    <link href="[@skillCSS]" rel="stylesheet">
    <link href="[@portfolioCSS]" rel="stylesheet">
    <style type="text/css">
    </style>
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a href="./index.php"><img class="logo" src="./assets/img/logo-white.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
    		     	<ul class="nav navbar-nav">
                <li class=""><a href="./index.php">Home</a></li>
    					  <li class=""><a href="./register.php">Register</a></li>
                <li class=""><a href="./login.php">Login</a></li>
  		      	</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <div class="social hidden-phone">
    [@facebook_link]
    [@linkedin_link]
    [@googlePlus_link]
    [@youtube_link]
  </div>

  [@headerHTML]
  [@profielHTML]

  <section id="skill-section" class="skill_[@skillClass]" style="background-color: [@skillBackground]">
  <div class="container" style="padding: 7vh;">
  <div class="row">
      <div class="col-md-12 text-center">
        <h2 style="color: [@skillColor];">Skills</h2>
      </div>
      <div class="col-md-12 text-center">
        [@skillHTML]
      </div>
  </div>
</section>

  [@portfolioWrapHead]
  [@portfolioHTML]
  [@portfolioWrapFoot]


  <!-- START FOOTER -->
  <div id="footer" class="container-fluid">
    <br>
    <p>COPYRIGHT © 2017 Arne Van Bavel</p>

  </div>

    <!-- Core JavaScript Files -->
    <script src="./assets/js/js/3.1.1.jquery.min.js"></script>
    <script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
    <script src="./assets/js/js/jquery.easing.min.js"></script>	
    <!-- Custom Theme JavaScript -->
    <script src="./assets/js/global.js"></script> 
    <script src="[@headerJS]"></script>
    <script src="[@profielJS]"></script> 
    <script src="[@skillJS]"></script> 
    <script type="text/javascript"> 
    </script>
</body>

</html>
