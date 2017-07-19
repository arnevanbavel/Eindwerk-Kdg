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
$random = rand(1,1000);
$random = "?id=".$random;

$template 			= new Template();
$profielsHTML 		= $template->getCreateProfiels();
$profielsCSS		= $template->getCreateProfielsCSS();
$profielsJS			= $template->getCreateProfielsJS();
$profielHTMLitems 	= "";
$profielCSSitems 	= "";
$profielJSitems 	= "";

foreach ($profielsHTML as $profielHTML) 
{
	$profielHTMLitems .= "<div class='item'>".$profielHTML."</div>";
}

foreach ($profielsCSS as $profielCSS) 
{
	$profielCSSitems .= "<link href='".$profielCSS."' rel='stylesheet'>";
}

foreach ($profielsJS as $profielJS) 
{
	$profielJSitems .= "<script src='".$profielJS."'></script> ";
}

$profielJS =	"./templatescreate/profiels/js/".$userData[0]["profiel_section"].".js";

//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount   = 0;
if ($friendRequests) {
  foreach ($friendRequests as $friendRequest){
    $friendsCount++;
  }
}

$createPage = new ArnesEngine("views/editeProfiel.tpl");

//::::::::::Friends
if ($friendsCount == 0) {
  $createPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");  
}else{
  $createPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");  
}

$createPage->set("profielHTMLitems", $profielHTMLitems);
$createPage->set("profielCSSitems", $profielCSSitems);
$createPage->set("profielJSitems", $profielJSitems);

$createPage->set("voornaam", $userData[0]['voornaam']);
$createPage->set("achternaam", $userData[0]['achternaam']);
$createPage->set("profiel_aboutMe", $userData[0]['profiel_aboutMe']);
$createPage->set("avatarUrl", "./upload/private/".$userData[0]['avatarUrl'].$random);

($userData[0]['role'] == 'admin') ? 
$createPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$createPage->set("admin", '');

echo $createPage->output();
 
?>