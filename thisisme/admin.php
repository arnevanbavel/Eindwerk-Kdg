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
    }
   
}
else
{
    header( 'location: login.php' );
}

$Allmembers = $dbClass->query('SELECT * FROM members');


//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount 	= 0;
if ($friendRequests) {
	foreach ($friendRequests as $friendRequest){
		$friendsCount++;
	}
}



$adminPage = new ArnesEngine("views/admin.tpl");

$table = "";
foreach ($Allmembers as $member) {
	$table .= "<tr class='row-".$member['username']."'>
			<td>".$member['id']."</td>
            <td>".$member['voornaam']."</td>
            <td>".$member['achternaam']."</td>
            <td>".$member['role']."</td>
            <td>".$member['memberSince']."</td>
            <td>".$member['email']."</td>
     		<td>
     			<a href='./adminmember.php?membername=".$member['username']."' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span></a> 
     			<a href='#' class='btn btn-danger DeleteUser' data-username='".$member['username']."'><span class='glyphicon glyphicon-trash'></span></a>
     		</td>
          </tr>"; 
}
$adminPage->set("table", $table);

//::::::::::Friends
if ($friendsCount == 0) {
	$adminPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");	
}else{
	$adminPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");	
}
($userData[0]['role'] == 'admin') ? 
$adminPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$adminPage->set("admin", '');

$adminPage->set("voornaam", $userData[0]['voornaam']);
echo $adminPage->output();
 
?>