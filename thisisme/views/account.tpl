<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
    <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta property="og:url"           content="'http://arnevanbavel.multimediatechnology.be/thisisme/share.php?username=[@username]'" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="THIS IS ME" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="[@avatarUrl]" />
	<!-- Standard css -->
  <!-- 
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css'>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css'>
  -->
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
  <link href="./assets/css/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="./assets/css/global2.css" rel="stylesheet">
  <link href="./assets/css/account.css" rel="stylesheet">
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

  <form action="./processes/account-process.php" method="POST" enctype="multipart/form-data">
  <section id="account-section">
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">[@voornaam] [@achternaam]</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6" align="center" style="margin-bottom: 20px;"> 
                  <img id="output"" alt="User Pic" src="[@avatarUrl]" class="img-responsive"> 
                </div>
                <div class="col-md-6" align="center" style="margin-bottom: 20px;"> 
                    <input type="file" name="file" onchange="loadFile(event)" accept=".jpg,.png,.jpeg">
                </div>
                
                <div class="col-md-12"> 
                  <table class="table-user-information">
                    <tbody>
                      <tr>
                        <td>Industry:</td>
                        <td><input type="text" class="form-control" name="industry" value="[@industry]" data-validation-optional="true" data-validation="length alphanumeric" data-validation-length="2-50" data-validation-allowing=" .'"></td>
                      </tr>
                      <tr>
                        <td>Firstname:</td>
                        <td><input type="text" class="form-control" name="voornaam" value="[@voornaam]" data-validation="length alphanumeric" data-validation-length="2-50" data-validation-allowing=" .'"></td>
                      </tr>
                      <tr>
                        <td>Lastname:</td>
                        <td><input type="text" class="form-control" name="achternaam" value="[@achternaam]" data-validation="length alphanumeric" data-validation-length="2-50" data-validation-allowing=" .'"></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input type="text" class="form-control" name="email" value="[@email]" data-validation="email"></td>
                      </tr>
                      <tr>
                        <td>Your Facebook Url:</td>
                        <td>
                          <input type="text" class="form-control" name="facebook_link" placeholder="Your Facebook Url" value="[@facebook_link]" 
                          data-validation="url" data-validation-optional="true" />
                        </td>
                      </tr>
                      <tr>
                        <td>Your Linkedin Url:</td>
                        <td>
                          <input type="text" class="form-control" name="linkedin_link" placeholder="Your Linkedin Url" value="[@linkedin_link]"
                          data-validation="url" data-validation-optional="true" />
                        </td>
                      </tr>
                      <tr>
                        <td>Your Google+ Url:</td>
                        <td>
                          <input type="text" class="form-control" name="googlePlus_link" placeholder="Your google+ Url" value="[@googlePlus_link]"
                          data-validation="url" data-validation-optional="true" />
                        </td>
                      </tr>
                      <tr>
                        <td>Your Youtube Url:</td>
                        <td>
                          <input type="text" class="form-control" name="youtube_link" placeholder="Your Youtube Url" value="[@youtube_link]"
                          data-validation="url" data-validation-optional="true" />
                        </td>
                      </tr>
                      <tr>
                        <td>Scroll down button:</td>
                        <td class="text-left">
                          <div class="material-switch">
                            <input id="someSwitchOptionSuccess" name="scroldownswitch" [@scroldown] type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>CV: 
                          <span class="cvpres">
                            <i class="fa fa-trash-o fa-2x trahscan" aria-hidden="true"></i>
                            <a href="[@download_link_cv]" download="[@cv_name]">[@cv_name]</a>
                          </span>
                        </td>
                        <td><input type="file" name="cv" accept=".pdf,.doc,.docx"></td>
                      </tr>
                      <tr>
                        <td>
                          Share your page: 
                        </td>
                        <td>
                          <div id="fb-root"></div>
                          <button id="shareBtn"  class="social-signin facebook">Share on facebook</button>                      
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Copy an paste this url to share your page:
                        </td>
                        <td><input type="text" value="http://arnevanbavel.multimediatechnology.be/thisisme/share.php?username=[@username]" disabled />                
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <a href="./mypage.php"><button class="cancel-button">Cancel</button></a>
              <span class="pull-right">
                <input type="submit" class="save-button" name="submit" value="Save">
              </span>
            </div>         
          </div>
        </div>
      </div>
    </div>

  </section>
</form>
<!--
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
= <script src="./assets/js/js/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script> 
= <script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
-->
<script src="./assets/js/js/jquery.min.js"></script> 
<script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
<!-- Custom Theme JavaScript -->
<script src="./assets/js/global.js"></script> 
<script src="./assets/js/facebook-sdk.js"></script> 
<script src="./assets/js/account.js"></script> 
<script src="./assets/js/js/validation.js"></script>
  <script>
  $.validate({
    lang: 'en',
    modules : 'security'
  });

  $( "#shareBtn" ).click(function( event ) {
  event.preventDefault();
  });

  document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'http://arnevanbavel.multimediatechnology.be/thisisme/share.php?username=[@username]',
  }, function(response){});
  }
</script>
</body>
</html>