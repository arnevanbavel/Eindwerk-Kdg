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

$template 			= new Template();
$skillsHTML 		= $template->getCreateskills($userData[0]["skill_section"]);
$skillArray			= $template->getskillData($userData[0]["id"], $dbClass);
$skillsCSS			= $template->getCreateskillsCSS();
$skillsJS			= $template->getCreateskillsJS();
$skillCSSitems 		= "";
$skillJSitems 		= "";

foreach ($skillsCSS as $skillCSS) 
{
	$skillCSSitems .= "<link href='".$skillCSS."' rel='stylesheet'>";
}

foreach ($skillsJS as $skillJS) 
{
	$skillJSitems .= "<script src='".$skillJS."'></script> ";
}

$invulHTML 	= "";
$skillcount = 1;

foreach ($skillArray as $skill => $value) {
	if ($skillcount !== 1) {
		$invulHTML .= 
		"<div class='row skillEdite'>
	        <div class='col-xs-8 col-sm-8 col-md-8'>
	            <div class='form-group'>
	                <input type='text' name='skill".$skillcount."' id='skill".$skillcount."' class='form-control input-sm skill_name' placeholder='Skill name' value='".$value["skill_title"]."' required maxlength='20'>
	            </div>
	        </div>
	        <div class='col-xs-4 col-sm-4 col-md-4'>
		        <div class='form-group'>
		            <input type='number' name='skill".$skillcount."Perc' id='skill".$skillcount."percent' class='form-control input-sm skill_score' placeholder='%' value='".$value["skill_score"]."' min='1' max='100'>
		        </div>
	        </div>
	        <div class='col-xs-12 col-sm-12 col-md-12'>
	            <div class='form-group'>
	                <div id='skill".$skillcount."BG' data-format='alias' class='input-group colorpicker-component'>
	                    <input id='skill".$skillcount."Color' name='skill".$skillcount."Color' type='text' value='".$value["skill_color"]."' class='form-control skill_color' required pattern='#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})'/>
	                    <span class='input-group-addon'><i></i></span>
	                </div>
	            </div>
	        </div>
	        <hr>
	    </div>";
	}
	++$skillcount;
}

$skillJS =	"./templatescreate/skills/js/".$userData[0]["skill_section"].".js";

//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount   = 0;
if ($friendRequests) {
  foreach ($friendRequests as $friendRequest){
    $friendsCount++;
  }
}

$createPage = new ArnesEngine("views/editeSkill.tpl");
$createPage->set("skillHTML", $skillsHTML);
$createPage->set("skillCSSitems", $skillCSSitems);
$createPage->set("skillJSitems", $skillJSitems);
$createPage->set("invulHTML", $invulHTML);

//::::::::::Friends
if ($friendsCount == 0) {
  $createPage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");  
}else{
  $createPage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");  
}

$createPage->set("voornaam", $userData[0]['voornaam']);
$createPage->set("skill_background", $userData[0]['skill_background']);
$createPage->set("skill_color", $userData[0]['skill_color']);
$createPage->set("skill_1_name", $skillArray[0]["skill_title"]);
$createPage->set("skill_1_%", $skillArray[0]["skill_score"]);
$createPage->set("skill_1_color", $skillArray[0]["skill_color"]);

$createPage->set("skillClass", $userData[0]["skill_section"]);
($userData[0]['role'] == 'admin') ? 
$createPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$createPage->set("admin", '');
echo $createPage->output();
?>