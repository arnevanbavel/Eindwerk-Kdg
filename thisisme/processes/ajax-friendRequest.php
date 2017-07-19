<?php
session_start();

function __autoload( $classname )
{
	require_once( '../classes/' . $classname . '.php' );
}

$message = NULL;
$USER    = new User();
$dbClass = new Database();
$db      = $dbClass->getDb();
$friend  = new Friend();

if ( $USER->validate($dbClass) )
{
    $userData   =   explode( ',', $_COOKIE['authenticated'] ); //explode sheid een string bij ','
    $username   =   $userData[0];
    $userData   =   $USER->toonInfo($dbClass, $username);
}
else
{
    header( 'location: ../login.php' );
}

$toDo 		= 	$_POST['toDo'];

if (isset($_POST['meberUsername'])) 
{
    $memberUsername = 	$_POST['meberUsername'];
    $memberData 	=   $USER->toonInfo($dbClass, $memberUsername);

    if ($toDo == 'AddFriend') { //Wanneer user iemand wilt toevoegen
    	$friend->AddFriend($dbClass,$userData[0]['id'],$memberData[0]['id']);
    	echo "<a href='#' id='Friend' class='pending' data-memberdata='".$memberData[0]['username']."'>
                    <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Pending
                  </a>";
        exit();
    }

    if ($toDo == 'pending') { //Wanneer user zijn request intrekt
    	$friend->RemoveFriend($dbClass,$userData[0]['id'],$memberData[0]['id']);
    	echo "<a href='#' id='Friend' class='AddFriend' data-memberdata='".$memberData[0]['username']."'>
                    <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Add
                  </a>";
        exit();
    }

    if ($toDo == 'acceptFromMemberPage') { //Wanneer user request accepteert

        $friend->AcceptFriend($dbClass,$userData[0]['id'],$memberData[0]['id']);
        echo "<a href='#' id='Friend' class='pending' data-memberdata='".$memberData[0]['username']."'>
                    <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Friends
                  </a>";
        exit();
    }

    if ($toDo == 'accept') { //Wanneer user request accepteert

        $friend->AcceptFriend($dbClass,$userData[0]['id'],$memberData[0]['id']);
        echo "<div id='FriendDiv-".$memberData[0]['username']."' class='col-md-6'>
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
                                        <span class='glyphicon glyphicon-heart'></span> Profile
                                    </a>
                                    <a href='./mail.php?username=".$memberData[0]['username']."' class='btn btn-xs btn-info'>
                                        <span class='glyphicon glyphicon-envelope'></span> Mail
                                    </a>
                                    <a href='#' class='btn btn-xs btn-danger DeleteButton' data-memberusername='".$memberData[0]['username']."'>
                                        <span class='glyphicon glyphicon-ban-circle'></span> Delete
                                    </a>
                                </p>
                            </div>
                        </div>
                     </div>
                  </div>";
        exit();
    }

    if ($toDo == 'delete') { //Wanneer user bestaande vriend verwijderd

        $friend->DeleteFriend($dbClass,$userData[0]['id'],$memberData[0]['id']);
        echo "Delete";
        exit();
    }

    if ($toDo == 'remove') { //Wanneer user gekregen request niet accepteert

        $friend->RemoveRequest($dbClass,$userData[0]['id'],$memberData[0]['id']);
        echo "Remove";
        exit();
    }
}

?>