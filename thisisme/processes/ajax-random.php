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

if ( $USER->validate($dbClass) )
{
    $userData   =   explode( ',', $_COOKIE['authenticated'] ); //explode sheid een string bij ','
    $username   =   $userData[0];       //username adress
    $userData   =   $USER->toonInfo($dbClass, $username);
}
else         //kijkt of er iets in de sessie zit
{
    header( 'location: login.php' );
    exit();
}
	
$toDo 		= 	$_POST['toDo'];

if ($toDo == 'removeCv') { //Wanneer user iemand wilt toevoegen
	
	$mask = "../upload/private/cv/cv_".$userData[0]['username'].".*";
    array_map('unlink', glob($mask));

    $dbClass->query('UPDATE members 
		SET cv 		= :cv
		WHERE id 	= :members_id',
		array(
		':members_id' 	=> $userData[0]["id"], 
		':cv' 			=> ""
	));
	echo true;
	exit();
}

if ($toDo == 'deletePortfolioImage') { //Wanneer user iemand wilt toevoegen
	$numItems 	 = 	$_POST['numItems'];
	$DelFilePath = glob("../upload/private/portfolio_".$userData[0]['username']."_".$numItems.".*");
    if (file_exists($DelFilePath[0])) { unlink ($DelFilePath[0]); }
	echo true;
	exit();
}

if ($toDo == 'deleteUserFromDb') { //Wanneer user iemand wilt toevoegen
	$memberusername 	 = 	$_POST['memberusername'];
	$userData   =   $USER->deleteUser($dbClass, $memberusername);
	foreach (glob("../upload/private/*".$memberusername."*.*") as $filename) {
    unlink($filename);
	}
	echo true;
	exit();
}

?>