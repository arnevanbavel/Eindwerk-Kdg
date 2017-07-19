<!DOCTYPE html>
<html>
<head>
  <title>Portfolio</title>
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <!-- Standard css -->
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
  <link href="./assets/css/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet prefetch' href='./assets/css/css/OwlCarousel2-2.2.1/assets/owl.carousel.min.css'>
  <link rel='stylesheet prefetch' href='./assets/css/css/OwlCarousel2-2.2.1/assets/owl.theme.default.min.css'>
  <link href="./assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="./assets/css/global2.css" rel="stylesheet">
  <link href="./assets/css/editepage.css" rel="stylesheet">
  [@portfolioCSSitems]

  <style type="text/css">
  #big .active{
    height: 100% !important;
  }
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
  <form role="form" action='./processes/create-portfolios-process.php' method='POST' enctype="multipart/form-data">
  <section id="edite-section">
        <div class="container">
            <div class="row edit-row">
                <div class="col-sm-8" style="">
                  <div class="outer">
                    <div id="big" class="owl-carousel owl-theme">
                          [@portfolioHTMLitems]
                    </div>
                    <div id="thumbs" class="owl-carousel owl-theme">
                      <div class="item" id="default_tmp">
                        <img src="./assets/img/owl-img/full_portfolio_default.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="flower_tmp">
                        <img src="./assets/img/owl-img/full_portfolio_flower.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="milo_tmp">
                        <img src="./assets/img/owl-img/full_portfolio_milo.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="oscar_tmp">
                        <img src="./assets/img/owl-img/full_portfolio_oscar.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="romeo_tmp">
                        <img src="./assets/img/owl-img/full_portfolio_romeo.JPG" class="img-responsive">
                      </div>
                      <div class="item" id="roxy_tmp">
                        <img src="./assets/img/owl-img/full_portfolio_roxy.JPG" class="img-responsive">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 eenbeetjespacing">
                  <div class="form-area">  
                    <br style="clear:both">
                                <h3 style="margin-bottom: 15px;">Edit portfolio</h3>
                      <div class="form-group">
                        <label class="control-label">Background Color</label>
                          <div id="portfolioBackgroundColor" data-format="alias" class="input-group colorpicker-component">
                            <input id="portfolio_background_color" name="portfolio_background_color" type="text" value="[@portfolio_background_color]" class="form-control" required pattern="#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})" />
                            <span class="input-group-addon"><i></i></span>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Text Color</label>
                          <div id="portfolioColor" data-format="alias" class="input-group colorpicker-component">
                            <input id="portfolio_color" name="portfolio_color" type="text" value="[@portfolio_color]" class="form-control" required pattern="#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})"/>
                            <span class="input-group-addon"><i></i></span>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Selected Template</label>
                        <input type="text" class="form-control" id="selectedTemplate" name="selectedTemplate" value="small" required readonly>
                      </div>
                      <hr>
                    
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12 margin-bottom-15">
                <div class="tabbable-panel">
                  <div class="form-area"> 
                    <div class="tabbable-line">
                      <ul class="nav nav-tabs ">
                        <li class="active tabButton">
                          <a href="#tab_default_1" data-toggle="tab">
                          Tab 1 </a>
                        </li>
                        [@invulTabsHTML]
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <input type="text" class="form-control portfolioTitle" id="title0" name="title0" placeholder="Title" value="[@title0]" required maxlength="20">
                            </div>
                            <div class="form-group"> 
                              <input type="text" class="form-control portfolioCaption" id="caption0" name="caption0" placeholder="Caption" value="[@caption0]" required maxlength="20">
                            </div>
                            <div class="form-group">
                              <i class="fa fa-trash-o fa-2x trahscan" aria-hidden="true"></i><input type="file" id="image0" class="portfolioImage" name="image0" data-image0="[@image0]" accept=".png,.jpg,.jpeg">
                            </div>
                          </div>
                          <div class="col-sm-8">
                              <textarea class="form-control portfolioExtra" id="extra0" name="extra0" placeholder="Extra" maxlength="100" rows="3">[@extra0]</textarea>
                              <span class="help-block"><p id="characters" class="help-block "></p></span>                    
                              <input type="url" class="form-control portfolioLink" id="link0" name="link0" placeholder="Link" value="[@link0]">
                          </div>
                        </div>
                        [@invulHTML]
                      </div>
                    </div>
                    <hr class="margin-top-0">
                    <div class="form-group">
                      <div class="portfolioButtons">
                        <a href="#" class="btn btn-default addSkill"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                        <a href="#" class="btn btn-default removeSkill"><i class="fa fa-minus" aria-hidden="true"></i> Remove</a>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="btn-group text-center">
                        <button type="submit" id="submit" name="submit" class="save-button">Save</button>
                      </div>
                    </div> 
                  </div> <!-- div form-area -->
                </div> <!-- div tabs-panel -->
              </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section> <!-- section -->
  </form> <!-- row -->

<script src="./assets/js/js/jquery.min.js"></script>
<script src='./assets/css/css/OwlCarousel2-2.2.1/owl.carousel.min.js'></script>
<script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
<script src="./assets/js/js/jquery.easing.min.js"></script> 
<script src="./assets/js/js/bootstrap-colorpicker.min.js"></script> 
<!-- Custom Theme JavaScript -->
<script src="./assets/js/global.js"></script>
<script src="./assets/js/editePage.js"></script>   
<script src="./assets/js/editePortfolio.js"></script>
[@portfolioJSitems]
<script type="text/javascript">
</script>
</body>
</html>