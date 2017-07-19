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
    $username   =   $userData[0];       //username adress
    $userData   =   $USER->toonInfo($dbClass, $username);
}
else         //kijkt of er iets in de sessie zit
{
    header( 'location: login.php' );
}
$random = rand(1,1000);
$random = "?id=".$random;

$template = new Template();
//::::::::::HEADER
$headerHTML 	= $template->getheader($userData[0]["header_section"]);
$headerCSS 		= "./templates/headers/css/".$userData[0]["header_section"].".css";
$headerJS 		= "./templates/headers/js/".$userData[0]["header_section"].".js";

//::::::::::PROFIEL
$profielHTML 	= $template->getprofiel($userData[0]["profiel_section"]);
$profielCSS 	= "./templates/profiels/css/".$userData[0]["profiel_section"].".css";
$profielJS 		= "./templates/profiels/js/".$userData[0]["profiel_section"].".js";

//::::::::::SKILL
$skillHTML 		= $template->getskill($userData[0]["skill_section"]);
$skillCSS 		= "./templates/skills/css/".$userData[0]["skill_section"].".css";
$skillJS 		= "./templates/skills/js/".$userData[0]["skill_section"].".js";
$skillArray		= $template->getskillData($userData[0]["id"], $dbClass);
$skillAllHTML 	= "";
$skillcount 	= 0;
foreach ($skillArray as $skill) {
	$skillVan 		= array("[@skillTitle]", "[@skillScore]", "[@skillColor]");
	$skillNaar  	= array("[@skillTitle".$skillcount."]", "[@skillScore".$skillcount."]", "[@skillColor".$skillcount."]");
	$skillHTMLafter = str_replace($skillVan,$skillNaar,$skillHTML);
	$skillAllHTML  .= $skillHTMLafter;
	++$skillcount;
}
//::::::::::PORTFOLIO
$portfolioHTML 		= $template->getportfolio($userData[0]["portfolio_section"]);
$portfolioHTMLHead 	= $template->getportfolioHead($userData[0]["portfolio_section"]);
$portfolioHTMLFoot 	= $template->getportfolioFoot($userData[0]["portfolio_section"]);
$portfolioCSS 		= "./templates/portfolios/css/".$userData[0]["portfolio_section"].".css";
$portfolioJS 		= "./templates/portfolios/js/".$userData[0]["portfolio_section"].".js";
$portfolioArray		= $template->getportfolioData($userData[0]["id"], $dbClass);
$portfolioAllHTML 	= "";
$portfoliocount 	= 0;
foreach ($portfolioArray as $portfolio) {
	$portfolioVan 		= array("[@portfolio_link]", "[@portfolio_extra]", "[@portfolio_img]", "[@portfolio_title]", "[@portfolio_caption]");
	$portfolioNaar  	= array("[@portfolio_link".$portfoliocount."]", 
								"[@portfolio_extra".$portfoliocount."]", 
								"[@portfolio_img".$portfoliocount."]", 
								"[@portfolio_title".$portfoliocount."]", 
								"[@portfolio_caption".$portfoliocount."]");
	$portfolioHTMLafter = str_replace($portfolioVan,$portfolioNaar,$portfolioHTML);
	$portfolioAllHTML  .= $portfolioHTMLafter;
	++$portfoliocount;
}

//::::::::::Friends
$friendRequests = $friends->CheckNewFriends($dbClass,$userData[0]['id']);
$friendsCount 	= 0;
if ($friendRequests) {
	foreach ($friendRequests as $friendRequest){
		$friendsCount++;
	}
}

//::::::::::ENGINE ;-)
$mypage = new ArnesEngine("views/mypage.tpl");

//CSS
$mypage->set("headerCSS", $headerCSS);
$mypage->set("profielCSS", $profielCSS);
$mypage->set("skillCSS", $skillCSS);
$mypage->set("portfolioCSS", $portfolioCSS);
//HTML
$mypage->set("headerHTML", $headerHTML);
$mypage->set("profielHTML", $profielHTML);
$mypage->set("skillHTML", $skillAllHTML);
$mypage->set("portfolioWrapHead", $portfolioHTMLHead);
$mypage->set("portfolioHTML", $portfolioAllHTML);
$mypage->set("portfolioWrapFoot", $portfolioHTMLFoot);
//JS
$mypage->set("headerJS", $headerJS);
$mypage->set("profielJS", $profielJS);
$mypage->set("skillJS", $skillJS);
$mypage->set("portfolioJS", $portfolioJS);

$mypage->set("errorType", $message['type']);
$mypage->set("errorText", $message['text']);
$mypage->set("voornaam", $userData[0]['voornaam']);
$mypage->set("achternaam", $userData[0]['achternaam']);
$mypage->set("avatarUrl", "./upload/private/".$userData[0]['avatarUrl'].$random);
$mypage->set("skillClass", $userData[0]["skill_section"]);
$mypage->set("skillBackground", $userData[0]["skill_background"]);
$mypage->set("skillColor", $userData[0]["skill_color"]);

($userData[0]['scroldown'] == 'yes') ? $mypage->set("scroldown", "") : $mypage->set("scroldown", 'none');

($userData[0]['cv'] != '') ? 
$mypage->set("cv", "<p>Resume: <a href='./upload/private/cv/".$userData[0]['cv']."' download='".$userData[0]['cv']."'>Download</a></p>") :
$mypage->set("cv", '');

//::::::::::Friends
if ($friendsCount == 0) {
	$mypage->set("friendRequests", "<span id='friendlabel' class='badge'>0</span>");	
}else{
	$mypage->set("friendRequests", "<span id='friendlabel' class='badge'>".$friendsCount."</span>");	
}

$skillcount 	= 0;
foreach ($skillArray as $skill => $value) {
	$mypage->set("skillTitle".$skillcount, $value["skill_title"]);
	$mypage->set("skillScore".$skillcount, $value["skill_score"]);
	$mypage->set("skillColor".$skillcount, $value["skill_color"]);
	++$skillcount;
}

$portfoliocount 	= 0;
foreach ($portfolioArray as $portfolio => $value) {
	$mypage->set("portfolio_link".$portfoliocount, $value["link"]);
	$mypage->set("portfolio_extra".$portfoliocount, $value["extra"]);
	if (file_exists($value["image"])) {
		$mypage->set("portfolio_img".$portfoliocount, $value["image"].$random);
	}else
	{
		$mypage->set("portfolio_img".$portfoliocount, "./assets/img/placeholder.png");
	}
	$mypage->set("portfolio_title".$portfoliocount, $value["title"]);
	$mypage->set("portfolio_caption".$portfoliocount, $value["caption"]);
	++$portfoliocount;
}
$mypage->set("portfolio_background_color", $userData[0]["portfolio_background_color"]);
$mypage->set("portfolio_color", $userData[0]["portfolio_color"]);

($userData[0]['facebook_link'] != '') ? 
$mypage->set("facebook_link", "<a href='".$userData[0]['facebook_link']."'><img src='./assets/img/social/Facebook.svg'></a>") :
$mypage->set("facebook_link", '');
($userData[0]['linkedin_link'] != '') ? 
$mypage->set("linkedin_link", "<a href='".$userData[0]['linkedin_link']."'><img src='./assets/img/social/Linkedin.svg'></a>") :
$mypage->set("linkedin_link", '');
($userData[0]['googlePlus_link'] != '') ? 
$mypage->set("googlePlus_link", "<a href='".$userData[0]['googlePlus_link']."'><img src='./assets/img/social/Google+.svg'></a>") :
$mypage->set("googlePlus_link", '');
($userData[0]['youtube_link'] != '') ? 
$mypage->set("youtube_link", "<a href='".$userData[0]['youtube_link']."'><img src='./assets/img/social/YouTube.svg'></a>") :
$mypage->set("youtube_link", '');

$mypage->set("header_image", 'background-image:url('.$userData[0]['header_image'].$random.');');
$mypage->set("header_bigSentence", $userData[0]['header_bigSentence']);
$mypage->set("header_smallSentence", $userData[0]['header_smallSentence']);
$mypage->set("profiel_aboutMe", $userData[0]['profiel_aboutMe']);

($userData[0]['role'] == 'admin') ? 
$mypage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$mypage->set("admin", '');

echo $mypage->output();
?>