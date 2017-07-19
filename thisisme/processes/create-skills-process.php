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
$i = 1;

$dbClass->query( "DELETE FROM skills
                    WHERE members_id = :members_id",
                    array(':members_id' => $userData[0]["id"] ));

while ( $i <= 10) {

    $skill          = isset($_POST["skill".$i]) ? $_POST["skill".$i] : false;
    $skillPerc      = isset($_POST["skill".$i."Perc"]) ? $_POST["skill".$i."Perc"] : false;
    $skillcolor     = isset($_POST["skill".$i."Color"]) ? $_POST["skill".$i."Color"] : false;
    if ($skill == false || $skillPerc == false || $skillcolor == false) {
    } else {
        $ok = $dbClass->query( "
                INSERT INTO skills ( members_id, skill_position, skill_title, skill_score, skill_color) 
                VALUES ( :members_id, :skill_position, :skill_title, :skill_score, :skill_color)",  
                array(
                ':members_id' => $userData[0]['id'],
                ':skill_position' => '1',
                ':skill_title' => $skill,
                ':skill_score' => $skillPerc,
                ':skill_color' => $skillcolor
                )); 
    }       
    $i++;
}

$dbClass->query('UPDATE members 
    SET skill_background = :skill_background, skill_color = :skill_color
    WHERE id = :members_id',
    array(
    ':members_id' => $userData[0]["id"], 
    ':skill_background'   => $_POST["skill_background_color"],
    ':skill_color'   => $_POST["skill_color"]  
));

header( 'location: ../mypage.php' );
exit();
	
/*
   	$ok = $dbClass->query("UPDATE members
                            JOIN skills
                            ON members.id = skills.members_id
                            SET skill_position = :skill_position,
                            skill_title = :skill_title,
                            skill_score = :skill_score
                            WHERE members.id = :id", 
                    array(':id' => $userData[0]["id"], 
                    		':skill_position' => '40',
					    	':skill_title' => 'reggreg',
					    	':skill_score' => '5' 
                    	));

   	$dbClass->query("UPDATE members
                            JOIN skills
                            ON members.id = skills.members_id
                            SET skills.title = :title
                            WHERE members.id = :id", 
                    array(':id' => $userData[0]["id"] )
                );*/

?>