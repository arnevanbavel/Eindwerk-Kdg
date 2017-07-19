<!DOCTYPE html>
<html>
<head>
	<title>Skill</title>
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<!-- Standard css -->
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
  <link href="./assets/css/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <link href="./assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="./assets/css/global2.css" rel="stylesheet">
  <link href="./assets/css/editepage.css" rel="stylesheet">
  [@skillCSSitems]

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
                <div class="col-sm-8 skillPreviewDiv">
                  <section id="skill-section" class="skill_default_tmp" style="background-color: #262626">
                    <div class="" style="padding: 5vh;">
                    <div class="row">
                      <div class="col-sm-12 text-center">
                        <h2 class="preview-section-title">Skills</h2>
                        </div>
                        <div class="col-sm-12 text-center">
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                          <div class="skillbar preview-skillbar" style="display: none;" data-percent="80%">
                            <div class="skillbar-title" style="background: [@skillColor];"><span class="preview-skillTitle"></span></div>
                            <div class="skillbar-bar" style="background: [@skillColor];"></div>
                            <div class="skill-bar-percent preview-skillScore"></div>
                          </div>
                        </div>
                    </div>
                    </div>
                  </section>
                </div>
                <div class="col-sm-4 margin-bottom-15">
                  <div class="form-area">  
                    <form role="form" action='./processes/create-skills-process.php' method='POST'>
                    <br style="clear:both">
                      <h3 style="margin-bottom: 15px; text-align: center;">Become unique</h3>
                      <div class="form-group">
                        <label class="control-label">Background Color</label>
                        <div id="skillBackgroundColor" data-format="alias" class="input-group colorpicker-component">
                          <input id="skill_background_color" name="skill_background_color" type="text" value="[@skill_background]" class="form-control" required pattern="#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})" />
                          <span class="input-group-addon"><i></i></span>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label">Text Color</label>
                        <div id="skillColor" data-format="alias" class="input-group colorpicker-component">
                         <input id="skill_color" name="skill_color" type="text" value="[@skill_color]" class="form-control" required pattern="#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Skills</label>
                      </div>
                      <div class="row skillEdite">
                        <div class="col-xs-8 col-sm-8 col-md-8">
                          <div class="form-group">
                            <input type="text" name="skill1" id="skill1" class="form-control input-sm skill_name" placeholder="Skill name" value="[@skill_1_name]"
                            required maxlength="20">
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <input type="number" name="skill1Perc" id="skill1percent" class="form-control input-sm skill_score" placeholder="%" value="[@skill_1_%]"
                            min='1' max='100'>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <div id="skill1BG" data-format="alias" class="input-group colorpicker-component">
                              <input id="skill1Color" name="skill1Color" type="text" value="[@skill_1_color]" class="form-control skill_color" required pattern="#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})" />
                              <span class="input-group-addon"><i></i></span>
                            </div>
                          </div>
                        </div>
                        <hr>
                      </div>
                      [@invulHTML]
                      <a href="#" class="btn btn-default addSkill"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                      <a href="#" class="btn btn-default removeSkill"><i class="fa fa-minus" aria-hidden="true"></i> Remove</a>
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
<script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
<script src="./assets/js/js/jquery.easing.min.js"></script> 
<script src="./assets/js/js/bootstrap-colorpicker.min.js"></script> 
<!-- Custom Theme JavaScript -->
<script src="./assets/js/global.js"></script>
<script src="./assets/js/editeSkill.js"></script>
[@skillJSitems]
</body>
</html>