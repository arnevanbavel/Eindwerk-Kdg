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

    if ($userData[0]['role'] !== 'admin') {
    	header( 'location: mypage.php' );
    }else{
        $membername     = $_GET['membername'];
        $memberData     =  $USER->toonInfo($dbClass, $membername);
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
$adminMemberPage = new ArnesEngine("views/adminmember.tpl");

//::::::::::Friends
if ($friendsCount == 0) {
	$adminMemberPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");	
}else{
	$adminMemberPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");	
}

($memberData[0]['voornaam'] == '') ? $adminMemberPage->set("firstname", "") :$adminMemberPage->set("firstname", $memberData[0]['voornaam']);
($memberData[0]['achternaam'] == '') ? $adminMemberPage->set("lastname", "") :$adminMemberPage->set("lastname", $memberData[0]['achternaam']);
($memberData[0]['username'] == '') ? $adminMemberPage->set("username", "") :$adminMemberPage->set("username", $memberData[0]['username']);
($memberData[0]['email'] == '') ? $adminMemberPage->set("email", "") :$adminMemberPage->set("email", $memberData[0]['email']);
($memberData[0]['cv'] == '') ? $adminMemberPage->set("cv", "") :$adminMemberPage->set("cv", $memberData[0]['cv']);
if ($memberData[0]['role'] == 'admin') {
    $adminMemberPage->set("role", "<option selected='selected'>admin</option><option>user</option>");
}else{
    $adminMemberPage->set("role", "<option selected='selected'>user</option><option>admin</option>");
}
($memberData[0]['industry'] == '') ? $adminMemberPage->set("industry", "") :$adminMemberPage->set("industry", $memberData[0]['industry']);
($memberData[0]['avatarUrl'] == '') ? $adminMemberPage->set("avatarUrl", "") :$adminMemberPage->set("avatarUrl", $memberData[0]['avatarUrl']);
($memberData[0]['facebook_link'] == '') ? $adminMemberPage->set("facebook", "") :$adminMemberPage->set("facebook", $memberData[0]['facebook_link']);
($memberData[0]['linkedin_link'] == '') ? $adminMemberPage->set("linkedin", "") :$adminMemberPage->set("linkedin", $memberData[0]['linkedin_link']);
($memberData[0]['googlePlus_link'] == '') ? $adminMemberPage->set("googlePlus", "") :$adminMemberPage->set("googlePlus", $memberData[0]['googlePlus_link']);
($memberData[0]['youtube_link'] == '') ? $adminMemberPage->set("youtube", "") :$adminMemberPage->set("youtube", $memberData[0]['youtube_link']);

($memberData[0]['header_section'] == '') ? $adminMemberPage->set("header_section", "") :$adminMemberPage->set("header_section", $memberData[0]['header_section']);
($memberData[0]['profiel_section'] == '') ? $adminMemberPage->set("profiel_section", "") :$adminMemberPage->set("profiel_section", $memberData[0]['profiel_section']);
($memberData[0]['skill_section'] == '') ? $adminMemberPage->set("skill_section", "") :$adminMemberPage->set("skill_section", $memberData[0]['skill_section']);
($memberData[0]['portfolio_section'] == '') ? $adminMemberPage->set("portfolio_section", "") :$adminMemberPage->set("portfolio_section", $memberData[0]['portfolio_section']);

$adminMemberPage->set("voornaam", $userData[0]['voornaam']);
($userData[0]['role'] == 'admin') ? 
$adminMemberPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$adminMemberPage->set("admin", '');
echo $adminMemberPage->output();
 
?>