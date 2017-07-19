<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<!-- Standard css -->
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
  <link href="./assets/css/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="./assets/css/global2.css" rel="stylesheet">
  <link href="./assets/css/admin.css" rel="stylesheet">
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
<form role="form" action='./processes/memberEdite-process.php' method='POST' enctype="multipart/form-data">
<div class="container adminEdite">
  <div class="accordion">
    <button class="back-button margin-bottom-10" >Back</button>
    <button class="save-button margin-bottom-10" type="submit">Save</button>
    <dl>
      <dt>
          <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">Account Info</a>
      </dt>
      <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
        <div class="container-fluid" style="padding-top: 20px;">
          <p class="headings">Account Info</p>
            <div class="row">
              <div class="col-xs-4">
                <label for="firstname" class="label-style">Firstname</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="firstname" class="form-control" placeholder="firstname" name="firstname" value="[@firstname]" required>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="lastname" class="label-style">Lastname</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="lastname" class="form-control" placeholder="lastname" name="lastname" value="[@lastname]" required>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="username" class="label-style">Username</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="username" class="form-control" placeholder="username" name="username" value="[@username]" required>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="role" class="label-style">Role</label>
              </div>
              <div class="form-group col-lg-4">
                <select class="form-control" id="role" name="role">
                [@role]
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="email" class="label-style">Email</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="email" class="form-control" placeholder="email" name="email" value="[@email]">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="avatarUrl" class="label-style">AvatarUrl</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="avatarUrl" class="form-control" placeholder="avatarUrl" name="avatarUrl" value="[@avatarUrl]">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="cv" class="label-style">Resume</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="cv" class="form-control" placeholder="cv" name="cv" value="[@cv]">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="industry" class="label-style">Indsurty</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="industry" class="form-control" placeholder="industry" name="industry" value="[@industry]">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="facebook" class="label-style">Facebook</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="facebook" class="form-control" placeholder="facebook" name="facebook" value="[@facebook]">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="linkedin" class="label-style">Linkedin</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="linkedin" class="form-control" placeholder="linkedin" name="linkedin" value="[@linkedin]">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="googlePlus" class="label-style">Google Plus</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="googlePlus" class="form-control" placeholder="googlePlus" name="googlePlus" value="[@googlePlus]">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="youtube" class="label-style">Youtube</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="youtube" class="form-control" placeholder="youtube" name="youtube" value="[@youtube]">
              </div>
            </div>
            <div class="button-container">
              <button class="save-button margin-bottom-10" type="submit">Save</button>
            </div>
        </div>
      </dd>
      <!-- end accordion tab 2 -->

      <dt>
          <!-- accordion tab 3 - Payment Info -->
          <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Templates</a>
        </dt>
      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
        <div class="container-fluid" style="padding-top: 20px;">
          <p class="headings">Templates</p>
            <div class="row">
              <div class="col-xs-4">
                <label for="header_section" class="label-style">Header template</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="header_section" class="form-control" placeholder="header_section" name="header_section" value="[@header_section]" required>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="profiel_section" class="label-style">Bio</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="profiel_section" class="form-control" placeholder="profiel_section" name="profiel_section" value="[@profiel_section]" required>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="skill_section" class="label-style">Skill</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="skill_section" class="form-control" placeholder="skill_section" name="skill_section" value="[@skill_section]" required>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label for="portfolio_section" class="label-style">Portfolio</label>
              </div>
              <div class="form-group col-lg-4">
                <input type="text" id="portfolio_section" class="form-control" placeholder="portfolio_section" name="portfolio_section" value="[@portfolio_section]" required>
              </div>
            </div>
            <div class="button-container">
              <button class="save-button margin-bottom-10" type="submit">Save</button>
            </div>
          </form>
        </div>
      </dd>
      <!-- end accordion tab 3 -->

    </dl>
    <!-- end description list -->
  </div>
  <!-- end accordion -->
</div>
<!-- end container -->


<script src="./assets/js/js/jquery.min.js"></script>
<script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
<!-- Custom Theme JavaScript -->
<script src="./assets/js/global.js"></script> 
<script src="./assets/js/adminmember.js"></script> 
<script type="text/javascript">
</script>

</script>
</body>
</html>