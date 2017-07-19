<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Standard css -->
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
  <link href="./assets/css/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/css/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
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

<div class="container">
  <div class="row">
    <div class="col-sm-12 adminTable">
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Role</th>
            <th>Member Since</th>
            <th>email</th>
            <th>Edit/Remove</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Role</th>
            <th>Member Since</th>
            <th>email</th>
            <th>Edit/Remove</th>
          </tr>
        </tfoot>
        <tbody>
          [@table]
        </tbody>
      </table>
    </div> 
  </div>     
</div>

<script src="./assets/js/js/jquery.min.js"></script> 
<script src='./assets/css/css/bootstrap-3.3.7/js/bootstrap.min.js'></script>
<script src='./assets/js/js/jquery.dataTables.min.js'></script>
<!-- Custom Theme JavaScript -->
<script src="./assets/js/global.js"></script> 
<script src="./assets/js/admin.js"></script> 
<script type="text/javascript">
</script>

</script>
</body>
</html>