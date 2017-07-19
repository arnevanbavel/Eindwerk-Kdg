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

$search  = $_POST['searchString'];
if (!empty($search)) 
{
		$users = $dbClass->query('SELECT * FROM members WHERE voornaam LIKE :search OR achternaam LIKE :search',
		array(
		':search' => '%'.$search.'%'
		));

	$response ="";
	foreach ($users as $user) {

		$link = "";
		if($user['id'] == $userData[0]['id']){
			$link = "href='./mypage.php'";
		}else{
			$link = "href='./member.php?username=".$user['username']."'";
		}

		$usersSkills = $dbClass->query('SELECT * FROM skills WHERE members_id = :members_id',
		array(
		':members_id' => $user['id']
		));

		$skillsNames = "";
		foreach ($usersSkills as $usersSkill) {
			$skillsNames .= "<li><a href='#'>".$usersSkill['skill_title']."</a></li>";
		}

		$description = substr($user['profiel_aboutMe'], 0, 112);

		$response .="<div class='col-md-6'>
            <div class='blog-card'>
                <div class='photo photo1'><img src='./upload/private/".$user['avatarUrl']."' class='profileimg img-responsive'></div>
                <ul class='details'>
                    <li class='author'><a ".$link.">".$user['voornaam']." ".$user['achternaam'] . "</a></li>
                    <li class='date'>".$user['memberSince']."</li>
                    <li class='tags'>
                        <ul>
                            ".$skillsNames."
                        </ul>
                    </li>
                </ul>
                <div class='description'>
                    <h1>".$user['voornaam']." ".$user['achternaam'] . "</h1>
                    <h2>".$user['industry']."</h2>
                    <p class='summary'>".$description."...</p>
                    <a ".$link.">Read More</a>
                </div>
            </div>
        </div>";

		/*$result .="<div>
					<div class='row'>
						<div class='col-md-2'>
							<img src='./upload/private/".$user['avatarUrl']."' class='img-thumbnail img-responsive'>
						</div>
						<div class='col-md-6'>
							<p>".$user['voornaam']." ".$user['achternaam'] . "<br> Web Developer </p>
						</div>
						<div class='col-md-4'>
							<p>Bekijk Profiel</p>
						</div>
					</div>
				</div>";*/
	}
}
else{

	$response ='<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>There were no "results" found</p>
						</div>
					</div>
				</div>';
}

echo $response;

?>