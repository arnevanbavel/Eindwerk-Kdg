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

//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount 	= 0;
if ($friendRequests) {
	foreach ($friendRequests as $friendRequest){
		$friendsCount++;
	}
}

$accountPage = new ArnesEngine("views/account.tpl");
//::::::::::Friends
if ($friendsCount == 0) {
	$accountPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");	
}else{
	$accountPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");	
}


$accountPage->set("voornaam", $userData[0]['voornaam']);
$accountPage->set("avatarUrl", "./upload/private/".$userData[0]['avatarUrl'].$random);
$accountPage->set("achternaam", $userData[0]['achternaam']);
$accountPage->set("email", $userData[0]['email']);
$accountPage->set("industry", $userData[0]['industry']);
$accountPage->set("facebook_link", $userData[0]['facebook_link']);
$accountPage->set("linkedin_link", $userData[0]['linkedin_link']);
$accountPage->set("googlePlus_link", $userData[0]['googlePlus_link']);
$accountPage->set("youtube_link", $userData[0]['youtube_link']);
$accountPage->set("download_link_cv", './upload/private/cv/'.$userData[0]['cv']);
$accountPage->set("cv_name", $userData[0]['cv']);
$accountPage->set("username", $userData[0]['username']);
($userData[0]['scroldown'] == 'yes') ? $accountPage->set("scroldown", "checked") : $accountPage->set("scroldown", '');

($userData[0]['role'] == 'admin') ? 
$accountPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$accountPage->set("admin", '');

echo $accountPage->output();
 
?>