<?php
session_start();

function __autoload( $classname )
{
	require_once( 'classes/' . $classname . '.php' );
}

$message = NULL;
$USER    = new User();
$dbClass = new Database();
$friends = new Friend();
$db      = $dbClass->getDb();


if ( $USER->validate($dbClass) )
{
    $userData   =   explode( ',', $_COOKIE['authenticated'] ); //explode sheid een string bij ','
    $username   =   $userData[0];
    $userData   =   $USER->toonInfo($dbClass, $username);
}
else
{
    header( 'location: login.php' );
}

$template 			= new Template();
$portfoliosHTML 	= $template->getCreateportfolios();
$portfoliosCSS		= $template->getCreateportfoliosCSS();
$portfoliosJS		= $template->getCreateportfoliosJS();
$portfolioHTMLitems = "";
$portfolioCSSitems 	= "";
$portfolioJSitems 	= "";

foreach ($portfoliosHTML as $portfolioHTML) 
{
	$portfolioHTMLitems .= "<div class='item'>".$portfolioHTML."</div>";
}

foreach ($portfoliosCSS as $portfolioCSS) 
{
	$portfolioCSSitems .= "<link href='".$portfolioCSS."' rel='stylesheet'>";
}

foreach ($portfoliosJS as $portfolioJS) 
{
	$portfolioJSitems .= "<script src='".$portfolioJS."'></script> ";
}
$portfolioArray			= $template->getportfolioData($userData[0]["id"], $dbClass);
$invulHTML = "";
$invulTabsHTML = "";
$portfoliocount = 0;
foreach ($portfolioArray as $portfolio => $value) {
	if ($portfoliocount !== 0) {
		$projectAaantal = $portfoliocount + 1;
    $invulTabsHTML .= "<li class='tabButton'>
                        <a href='#tab_default_".$projectAaantal."' data-toggle='tab'>
                        Tab ".$projectAaantal." </a>
                      </li>";   

    if (file_exists($value['image'])){
      $portfolioimage = $value['image'];
    }else{
      $portfolioimage = "./assets/img/placeholder.png";
    }

		$invulHTML .= 
    "<div class='tab-pane' id='tab_default_".$projectAaantal."'>
                        <div class='col-sm-4'>
                          <div class='form-group'>
                            <input type='text' class='form-control portfolioTitle' id='title".$portfoliocount."' name='title".$portfoliocount."' placeholder='Title' value='".$value['title']."' required maxlength='20'>
                          </div>
                          <div class='form-group'> 
                            <input type='text' class='form-control portfolioCaption' id='caption".$portfoliocount."' name='caption".$portfoliocount."' placeholder='Caption' value='".$value['caption']."' required maxlength='20'>
                          </div>
                          <div class='form-group'>
                            <i class='fa fa-trash-o fa-2x trahscan' aria-hidden='true'></i><input type='file' id='image".$portfoliocount."' class='portfolioImage' name='image".$portfoliocount."' data-image".$portfoliocount."='".$portfolioimage."' accept='.png,.jpg,.jpeg'>
                          </div>
                        </div>
                        <div class='col-sm-8'>
                            <textarea class='form-control portfolioExtra' id='extra".$portfoliocount."' name='extra".$portfoliocount."' placeholder='Extra' maxlength='100' rows='3'>".$value['extra']."</textarea>
                            <span class='help-block'><p id='characters' class='help-block '></p></span>                    
                            <input type='url' class='form-control portfolioLink' id='link".$portfoliocount."' name='link".$portfoliocount."' placeholder='Link' value='".$value['link']."'>
                        </div>
                      </div>";
	}
	++$portfoliocount;
}

//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount   = 0;
if ($friendRequests) {
  foreach ($friendRequests as $friendRequest){
    $friendsCount++;
  }
}

$createPage = new ArnesEngine("views/editePortfolio.tpl");
$createPage->set("portfolioHTMLitems", $portfolioHTMLitems);
$createPage->set("portfolioCSSitems", $portfolioCSSitems);
$createPage->set("portfolioJSitems", $portfolioJSitems);
$createPage->set("invulHTML", $invulHTML);
$createPage->set("invulTabsHTML", $invulTabsHTML);

//::::::::::Friends
if ($friendsCount == 0) {
  $createPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");  
}else{
  $createPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");  
}

$createPage->set("title0", $portfolioArray[0]["title"]);
$createPage->set("caption0", $portfolioArray[0]["caption"]);
$createPage->set("extra0", $portfolioArray[0]["extra"]);

if (file_exists($portfolioArray[0]["image"])) {
    $createPage->set("image0", $portfolioArray[0]["image"]);
}else{
    $createPage->set("image0", "./assets/img/placeholder.png");
}
$createPage->set("link0", $portfolioArray[0]["link"]);

$createPage->set("portfolio_background_color", $userData[0]["portfolio_background_color"]);
$createPage->set("portfolio_color", $userData[0]["portfolio_color"]);

$createPage->set("voornaam", $userData[0]['voornaam']);
$createPage->set("achternaam", $userData[0]['achternaam']);
$createPage->set("portfolioSection", $userData[0]['portfolio_section']);

($userData[0]['role'] == 'admin') ? 
$createPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$createPage->set("admin", '');

echo $createPage->output();
 
?>