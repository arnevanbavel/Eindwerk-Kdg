<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<!-- Standard css -->
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
  <link href="./assets/css/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet prefetch' href='./assets/css/css/OwlCarousel2-2.2.1/assets/owl.carousel.min.css'>
  <link rel='stylesheet prefetch' href='./assets/css/css/OwlCarousel2-2.2.1/assets/owl.theme.default.min.css'>
  <!-- Fonts -->
  <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="./assets/css/global2.css" rel="stylesheet">
  <link href="./assets/css/editepage.css" rel="stylesheet">
  [@headerCSSitems]

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
                <a href="./mypage.php"><img class="logo" src="./assets/img/logo-white.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
              <!-- Search Field -->
                <li class="searchField" style="display: none;">
                  <a>
                    <form method="POST" action="./search.php">
                      <input type="text" class="form-control input-sm" name="ZoekVeld" id="ZoekVeld" placeholder="Search and hit enter">
                    </form>
                  </a>
                </li>
                <li id="searchButton">
                  <a>
                    <span class="glyphicon glyphicon-search"></span>
                  </a>
                </li>
              <!-- End Search Field -->
                <li><a href="./mypage.php">My Page</a></li>
                <li class="dropdown active">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">[@voornaam] <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="./editeHeader.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> header</a></li>
                    <li><a href="./editeProfiel.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> bio</a></li>
                    <li><a href="./editeSkill.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> skills</a></li>
                    <li><a href="./editePortfolio.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> portfolio</a></li>
                    <li><a href="./account.php"><i class="fa fa-cog" aria-hidden="true"></i> User</a></li>
                    <li><a href="./logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    [@admin]
                  </ul>
                </li>
                <li><a href="./friends.php">Friends [@friendRequests]</a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  <section id="edite-section">
        <div class="container">
            <div class="row edit-row">
                <div class="col-sm-8" style="">
                  <div class="outer">
                    <div id="big" class="owl-carousel owl-theme">
                          [@headerHTMLitems]
                    </div>
                    <div id="thumbs" class="owl-carousel owl-theme">
                      <div class="item" id="default_tmp">
                        <img src="./assets/img/owl-img/full_header_default_tmp.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="hipster_tmp">
                        <img src="./assets/img/owl-img/full_header_hipster_tmp.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="music_tmp">
                        <img src="./assets/img/owl-img/full_header_music_tmp.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="night_tmp">
                        <img src="./assets/img/owl-img/full_header_night_tmp.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="rocky_tmp">
                        <img src="./assets/img/owl-img/full_header_rocky_tmp.JPG" class="img-responsive">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-area">  
                    <form role="form" action='./processes/create-header-process.php' method='post' enctype="multipart/form-data">
                    <br style="clear:both">
                      <h4 style="margin-bottom: 15px;">Edite Header</h4>
                      <div class="form-group">
                        <label class="control-label">Big</label>
                        <input type="text" class="form-control" id="header_bigSentence" name="header_bigSentence" placeholder="Big" value="[@header_bigSentence]" data-validation="length alphanumeric" data-validation-length="2-30" data-validation-allowing="-_#@ &%!?$€.,'">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Small</label>
                        <input type="text" class="form-control" id="header_smallSentence" name="header_smallSentence" placeholder="small" value="[@header_smallSentence]" 
                        data-validation="length alphanumeric" data-validation-length="2-50" data-validation-allowing="-_#@ &%!?$€.,'">
                      </div>
                      <div class="form-group">
                        <div class="checkbox">
                          <label><input type="checkbox" name="default_header_image" value="default" checked>Default image</label>
                        </div>
                        <input type="file" class="form-control" id="header_upload_image" name="header_upload_image" accept=".png,.jpg,.jpeg" disabled="disabled" onchange="loadFile(event)">
                        <!--<input type="text" class="form-control" id="header_image" name="header_image" placeholder="Link" value="[@header_image]" disabled="disabled">
                        -->
                      </div>
                      <div class="form-group">
                        <label class="control-label">Selected Template</label>
                        <input type="text" class="form-control" id="selectedTemplate" name="selectedTemplate" value="small" required readonly>
                      </div>
                      <hr>
                      <div class="form-group">
                        <div class="btn-group text-center">
                          <button type="submit" id="submit" name="submit" class="save-button">Save</button>
                        </div>
                      </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>

<script src="./assets/js/js/jquery.min.js"></script>
<script src='./assets/css/css/OwlCarousel2-2.2.1/owl.carousel.min.js'></script>
<script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
<script src="./assets/js/js/jquery.easing.min.js"></script> 
<!-- Custom Theme JavaScript -->
<script src="./assets/js/global.js"></script>
<script src="./assets/js/editePage.js"></script>   
<script src="./assets/js/editeHeader.js"></script>   
[@headerJSitems]
<script src="./assets/js/js/validation.js"></script>
  <script>
  $.validate({
    lang: 'en',
    modules : 'security'
  });
</script>
</body>
</html>