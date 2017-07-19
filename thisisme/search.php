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

$ZoekWoord = $_POST["ZoekVeld"];

//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount   = 0;
if ($friendRequests) {
  foreach ($friendRequests as $friendRequest){
    $friendsCount++;
  }
}

$searchPage = new ArnesEngine("views/search.tpl");
//::::::::::Friends
if ($friendsCount == 0) {
  $searchPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");  
}else{
  $searchPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");  
}

$searchPage->set("voornaam", $userData[0]['voornaam']);
$searchPage->set("ZoekWoord", $ZoekWoord);

($userData[0]['role'] == 'admin') ? 
$searchPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$searchPage->set("admin", '');
echo $searchPage->output();
 
?>