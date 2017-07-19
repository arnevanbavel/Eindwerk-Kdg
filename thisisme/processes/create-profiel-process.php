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
    $username   =   $userData[0];
    $userData   =   $USER->toonInfo($dbClass, $username);
}
else
{
    header( 'location: ../login.php' );
}

$selectedTemplate 			=	$_POST[ 'selectedTemplate' ];
$profiel_background_color	=	$_POST[	'profiel_background_color' ];
$profiel_aboutMe			=	$_POST[	'profiel_aboutMe' ];

echo $selectedTemplate;
echo $profiel_background_color;
echo $profiel_aboutMe;
		
$dbClass 	= 	new Database();

$dbClass->query('UPDATE members 
	SET profiel_section 			= :profiel_section,
	 	profiel_background_color 	= :profiel_background_color,
	 	profiel_aboutMe 			= :profiel_aboutMe
	WHERE id = :members_id',
	array(
	':members_id' 				=> $userData[0]["id"], 
	':profiel_section' 			=> $selectedTemplate, 
	':profiel_background_color' => $profiel_background_color, 
	':profiel_aboutMe' 			=> $profiel_aboutMe 

));

header( 'location: ../mypage.php' );
exit;
