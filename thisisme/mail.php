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

if ( $USER->validate($dbClass) )
{
    $userData   =   explode( ',', $_COOKIE['authenticated'] ); //explode sheid een string bij ','
    $username   =   $userData[0];
    $userData   =   $USER->toonInfo($dbClass, $username);

    if (isset($_GET['username'])) {
    	$memberUsername = $_GET['username'];
    	$memberData =   $USER->toonInfo($dbClass, $memberUsername);
    }else{
    	header( 'location: friends.php' );
    	exit();
    }
}
else
{
    header( 'location: login.php' );
}

//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount 	= 0;
if ($friendRequests) {
	foreach ($friendRequests as $friendRequest){
		$friendsCount++;
	}
}

$mailPage = new ArnesEngine("views/mail.tpl");
//::::::::::Friends
if ($friendsCount == 0) {
	$mailPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");	
}else{
	$mailPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");	
}


$mailPage->set("voornaam", $userData[0]['voornaam']);
$mailPage->set("achternaam", $userData[0]['achternaam']);
$mailPage->set("email", $userData[0]['email']);
$mailPage->set("membervoornaam",$memberData[0]['voornaam']);
$mailPage->set("meberusername",$memberData[0]['username']);

($userData[0]['role'] == 'admin') ? 
$mailPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$mailPage->set("admin", '');

echo $mailPage->output();
 
?>