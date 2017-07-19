<?php
session_start();

function __autoload( $classname )
{
	require_once( '../classes/' . $classname . '.php' );
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
        $membername     =  $_POST['username'];
        $memberData     =  $USER->toonInfo($dbClass, $membername);
    }
   
}
else
{
    header( 'location: login.php' );
}


$error = $dbClass->query('UPDATE members 
                SET username = :username,
                voornaam = :voornaam,
                achternaam = :achternaam,
                role = :role,
                avatarUrl = :avatarUrl,
                email = :email,
                cv = :cv,
                industry = :industry,
                facebook_link = :facebook_link,
                linkedin_link = :linkedin_link,
                googlePlus_link = :googlePlus_link,
                youtube_link = :youtube_link,
                header_section = :header_section,
                profiel_section = :profiel_section,
                skill_section = :skill_section,
                portfolio_section = :portfolio_section
    WHERE id = :members_id',
    array(
    ':members_id' => $memberData[0]["id"], 
    ':username'   => $_POST["username"],
    ':voornaam'   => $_POST["firstname"],
    ':achternaam' => $_POST["lastname"],
    ':role'       => $_POST["role"],
    ':avatarUrl'  => $_POST["avatarUrl"],
    ':email'      => $_POST["email"],
    ':cv'         => $_POST["cv"],
    ':industry'         => $_POST["industry"],
    ':facebook_link'    => $_POST["facebook"],
    ':linkedin_link'    => $_POST["linkedin"],
    ':googlePlus_link'  => $_POST["googlePlus"],
    ':youtube_link'     => $_POST["youtube"],
    ':header_section'   => $_POST["header_section"],
    ':profiel_section'  => $_POST["profiel_section"],
    ':skill_section'    => $_POST["skill_section"],
    ':portfolio_section'=> $_POST["portfolio_section"]
    ));
header( 'location: ../admin.php' );
exit();
 
?>