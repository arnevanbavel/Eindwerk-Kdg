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
$requests = "";
$RequestData = $friends->CheckNewFriends($dbClass, $userData[0]['id']);
if (!empty($RequestData)) {
	foreach ($RequestData as $Rdata) {
		$memberData   =   $friends->getFriendRequestData($dbClass, $Rdata['members_id']);
		$requests .= "<div id='div-".$memberData[0]['username']."' class='well well-sm'>
		                <div class='media'>
		                    <a class='media-object pull-left noBottomMargin' href='#'>
		                        <img src='./upload/private/".$memberData[0]['avatarUrl']."'>
		                    </a>
		                    <div class='media-body'>
		                        <h4 class='media-heading'>".$memberData[0]['voornaam']." ".$memberData[0]['achternaam']."</h4>
		                    <p>".$memberData[0]['industry']."</p>
		                        <p class='noBottomMargin'>
		                        	<a href='./member.php?username=".$memberData[0]['username']."' class='btn btn-xs btn-info'>
		                        		<span class='glyphicon glyphicon-user'></span> Profile
		                        	</a>
		                            <a href='#' class='btn btn-xs btn-success AcceptButton' data-memberusername='".$memberData[0]['username']."'>
		                            	<span class='glyphicon glyphicon-heart'></span> Add Friend
		                            </a>
		                            <a href='#' class='btn btn-xs btn-danger RemoveButton' data-memberusername='".$memberData[0]['username']."'>
		                            	<span class='glyphicon glyphicon-ban-circle'></span> Delete
		                            </a>
		                        </p>
		                    </div>
		                </div>
		             </div>";
	}
}else{
	$requests = 'No Requests';
}

$FriendsData = $friends->showFriends($dbClass, $userData[0]['id']);
$friendsHTML = "";
if (!empty($FriendsData))
{
	foreach ($FriendsData as $Fdata) 
	{
		if ($Fdata['members_id'] == $userData[0]['id']) {
			$memberData   =   $friends->getFriendRequestData($dbClass, $Fdata['sendedToId']);
		}else{
			$memberData   =   $friends->getFriendRequestData($dbClass, $Fdata['members_id']);
		} 
		
		$friendsHTML .= "<div id='FriendDiv-".$memberData[0]['username']."' class='col-md-6'>
			            <div class='well well-sm'>
		                <div class='media'>
		                    <a class='media-object pull-left noBottomMargin' href='#'>
		                        <img src='./upload/private/".$memberData[0]['avatarUrl']."'>
		                    </a>
		                    <div class='media-body'>
		                        <h4 class='media-heading'>".$memberData[0]['voornaam']." ".$memberData[0]['achternaam']."</h4>
		                    <p>".$memberData[0]['industry']."</p>
		                        <p class='noBottomMargin'>
		                        	<a href='./member.php?username=".$memberData[0]['username']."' class='btn btn-xs btn-info'>
		                        		<span class='glyphicon glyphicon-user'></span> Profile
		                        	</a>
		                        	<a href='./mail.php?username=".$memberData[0]['username']."' class='btn btn-xs btn-info'>
		                        		<span class='glyphicon glyphicon glyphicon-envelope'></span> Mail
		                        	</a>
		                            <a href='#' class='btn btn-xs btn-danger DeleteButton' data-memberusername='".$memberData[0]['username']."'>
		                            	<span class='glyphicon glyphicon-ban-circle'></span> Delete
		                            </a>
		                        </p>
		                    </div>
		                </div>
		             </div>
		          </div>";
	}

}else
{
	$friendsHTML = "Start making some friends...";
}

$friendsPage = new ArnesEngine("views/friends.tpl");
$friendsPage->set("voornaam", $userData[0]['voornaam']);
$friendsPage->set("requests", $requests);
$friendsPage->set("friends", $friendsHTML);

($userData[0]['role'] == 'admin') ? 
$friendsPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$friendsPage->set("admin", '');
echo $friendsPage->output();
 
?>