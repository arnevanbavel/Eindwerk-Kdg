<?php
session_start();

function __autoload( $classname )
{
    require_once( 'classes/' . $classname . '.php' );
}

$message = NULL;
$USER    = new User();
$dbClass = new Database();
$friend  = new Friend();
$db      = $dbClass->getDb();

if ( $USER->validate($dbClass) )
{
    $userData   =   explode( ',', $_COOKIE['authenticated'] ); //explode sheid een string bij ','
    $username   =   $userData[0];       //username adress
    $userData   =   $USER->toonInfo($dbClass, $username);

    if (isset($_GET['username'])) {
    	$memberUsername= $_GET['username'];
    	$memberData =   $USER->toonInfo($dbClass, $memberUsername);
    }else{
    	header( 'location: search.php' );
    	exit();
    }
}
else         //kijkt of er iets in de sessie zit
{
    header( 'location: login.php' );
    exit();
}
$random = rand(1,1000);
$random = "?id=".$random;

$template = new Template();
//::::::::::HEADER
$headerHTML 	= $template->getheader($memberData[0]["header_section"]);
$headerCSS 		= "./templates/headers/css/".$memberData[0]["header_section"].".css";
$headerJS 		= "./templates/headers/js/".$memberData[0]["header_section"].".js";

//::::::::::PROFIEL
$profielHTML 	= $template->getprofiel($memberData[0]["profiel_section"]);
$profielCSS 	= "./templates/profiels/css/".$memberData[0]["profiel_section"].".css";
$profielJS 		= "./templates/profiels/js/".$memberData[0]["profiel_section"].".js";

//::::::::::SKILL
$skillHTML 		= $template->getskill($memberData[0]["skill_section"]);
$skillCSS 		= "./templates/skills/css/".$memberData[0]["skill_section"].".css";
$skillJS 		= "./templates/skills/js/".$memberData[0]["skill_section"].".js";
$skillArray		= $template->getskillData($memberData[0]["id"], $dbClass);
$skillAllHTML 	="";
$skillcount 	= 0;
foreach ($skillArray as $skill) {
	$skillVan 		= array("[@skillTitle]", "[@skillScore]", "[@skillColor]");
	$skillNaar  	= array("[@skillTitle".$skillcount."]", "[@skillScore".$skillcount."]", "[@skillColor".$skillcount."]");
	$skillHTMLafter = str_replace($skillVan,$skillNaar,$skillHTML);
	$skillAllHTML  .= $skillHTMLafter;
	++$skillcount;
}
//::::::::::PORTFOLIO
$portfolioHTML      = $template->getportfolio($memberData[0]["portfolio_section"]);
$portfolioHTMLHead  = $template->getportfolioHead($memberData[0]["portfolio_section"]);
$portfolioHTMLFoot  = $template->getportfolioFoot($memberData[0]["portfolio_section"]);
$portfolioCSS       = "./templates/portfolios/css/".$memberData[0]["portfolio_section"].".css";
$portfolioJS        = "./templates/portfolios/js/".$memberData[0]["portfolio_section"].".js";
$portfolioArray     = $template->getportfolioData($memberData[0]["id"], $dbClass);
$portfolioAllHTML   = "";
$portfoliocount     = 0;
foreach ($portfolioArray as $portfolio) {
    $portfolioVan       = array("[@portfolio_link]", "[@portfolio_extra]", "[@portfolio_img]", "[@portfolio_title]", "[@portfolio_caption]");
    $portfolioNaar      = array("[@portfolio_link".$portfoliocount."]", 
                                "[@portfolio_extra".$portfoliocount."]", 
                                "[@portfolio_img".$portfoliocount."]", 
                                "[@portfolio_title".$portfoliocount."]", 
                                "[@portfolio_caption".$portfoliocount."]");
    $portfolioHTMLafter = str_replace($portfolioVan,$portfolioNaar,$portfolioHTML);
    $portfolioAllHTML  .= $portfolioHTMLafter;
    ++$portfoliocount;
}

//::::::::::ENGINE ;-)
$memberPage = new ArnesEngine("views/member.tpl");

//CSS
$memberPage->set("headerCSS", $headerCSS);
$memberPage->set("profielCSS", $profielCSS);
$memberPage->set("skillCSS", $skillCSS);
$memberPage->set("portfolioCSS", $portfolioCSS);
//HTML
$memberPage->set("headerHTML", $headerHTML);
$memberPage->set("profielHTML", $profielHTML);
$memberPage->set("skillHTML", $skillAllHTML);
$memberPage->set("portfolioWrapHead", $portfolioHTMLHead);
$memberPage->set("portfolioHTML", $portfolioAllHTML);
$memberPage->set("portfolioWrapFoot", $portfolioHTMLFoot);
//JS
$memberPage->set("headerJS", $headerJS);
$memberPage->set("profielJS", $profielJS);
$memberPage->set("skillJS", $skillJS);
$memberPage->set("portfolioJS", $portfolioJS);

($memberData[0]['scroldown'] == 'yes') ? $memberPage->set("scroldown", "") : $memberPage->set("scroldown", 'none');

($memberData[0]['cv'] != '') ? 
$memberPage->set("cv", "<p>Resume: <a href='./upload/private/cv/".$memberData[0]['cv']."' download='".$memberData[0]['cv']."'>Download</a></p>") :
$memberPage->set("cv", '');

$memberPage->set("errorType", $message['type']);
$memberPage->set("errorText", $message['text']);
$memberPage->set("voornaamUser", $userData[0]['voornaam']);
$memberPage->set("voornaam", $memberData[0]['voornaam']);
$memberPage->set("achternaam", $memberData[0]['achternaam']);
$memberPage->set("username", $memberData[0]['username']);
$memberPage->set("avatarUrl", "./upload/private/".$memberData[0]['avatarUrl'].$random);
$memberPage->set("skillClass", $memberData[0]["skill_section"]);
$memberPage->set("skillBackground", $memberData[0]["skill_background"]);
$memberPage->set("skillColor", $memberData[0]["skill_color"]);

$skillcount 	= 0;
foreach ($skillArray as $skill => $value) {
	$memberPage->set("skillTitle".$skillcount, $value["skill_title"]);
	$memberPage->set("skillScore".$skillcount, $value["skill_score"]);
	$memberPage->set("skillColor".$skillcount, $value["skill_color"]);
	++$skillcount;
}

$portfoliocount     = 0;
foreach ($portfolioArray as $portfolio => $value) {
    $memberPage->set("portfolio_link".$portfoliocount, $value["link"]);
    $memberPage->set("portfolio_extra".$portfoliocount, $value["extra"]);
    if (file_exists($value["image"])) {
        $memberPage->set("portfolio_img".$portfoliocount, $value["image"].$random);
    }else
    {
        $memberPage->set("portfolio_img".$portfoliocount, "./assets/img/placeholder.png");
    }
    $memberPage->set("portfolio_title".$portfoliocount, $value["title"]);
    $memberPage->set("portfolio_caption".$portfoliocount, $value["caption"]);
    ++$portfoliocount;
}
$memberPage->set("portfolio_background_color", $memberData[0]["portfolio_background_color"]);
$memberPage->set("portfolio_color", $memberData[0]["portfolio_color"]);



//::::::::::Friends
$friendstatus = $friend->CheckFriendsStatus($dbClass,$userData[0]['id'],$memberData[0]['id']);
if (empty($friendstatus[0]['status'])) //Er is nog geen vriendschaps verzoek gestuurd tussen de user en de member
{
    $memberPage->set("friendRequests", "<a href='#' id='Friend' class='AddFriend' data-memberdata='".$memberData[0]['username']."'>
                    <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Add
                  </a>");
}
elseif($friendstatus[0]['status'] == "pending") //Er is nog een vriendschaps verzoek gestuurd tussen de user en de member
{
    $friendstatus2 = $friend->CheckifUserSended($dbClass,$userData[0]['id'],$memberData[0]['id']);
    if (!empty($friendstatus2[0]['status'])) //De user heeft hem verstuurd naar naar de member maar de member heeft nog niet geaccepteerd
    {
       $memberPage->set("friendRequests", "<a href='#' id='Friend' class='pending' data-memberdata='".$memberData[0]['username']."'>
                    <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Pending
                  </a>");
    }
    else //De member heeft hem verstuurd naar naar de user maar de user heeft nog niet geaccepteerd
    {
        $memberPage->set("friendRequests", "<a href='#' id='Friend' class='acceptFromMemberPage' data-memberdata='".$memberData[0]['username']."'>
                    <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Accept
                  </a>");   
    } 
}else{ //Ze zijn al vrienden.
    $memberPage->set("friendRequests", "<a href='#' id='Friend' class='pending' data-memberdata='".$memberData[0]['username']."'>
                    <span class='glyphicon glyphicon-user' aria-hidden='true'></span> Friends
                  </a>");    
}

($memberData[0]['facebook_link'] != '') ? 
$memberPage->set("facebook_link", "<a href='".$memberData[0]['facebook_link']."'><img src='./assets/img/social/Facebook.svg'></a>") :
$memberPage->set("facebook_link", '');
($memberData[0]['linkedin_link'] != '') ? 
$memberPage->set("linkedin_link", "<a href='".$memberData[0]['linkedin_link']."'><img src='./assets/img/social/Linkedin.svg'></a>") :
$memberPage->set("linkedin_link", '');
($memberData[0]['googlePlus_link'] != '') ? 
$memberPage->set("googlePlus_link", "<a href='".$memberData[0]['googlePlus_link']."'><img src='./assets/img/social/Google+.svg'></a>") :
$memberPage->set("googlePlus_link", '');
($memberData[0]['youtube_link'] != '') ? 
$memberPage->set("youtube_link", "<a href='".$memberData[0]['youtube_link']."'><img src='./assets/img/social/YouTube.svg'></a>") :
$memberPage->set("youtube_link", '');

$memberPage->set("header_image", 'background-image:url('.$memberData[0]['header_image'].$random.');');
$memberPage->set("header_bigSentence", $memberData[0]['header_bigSentence']);
$memberPage->set("header_smallSentence", $memberData[0]['header_smallSentence']);
$memberPage->set("profiel_aboutMe", $memberData[0]['profiel_aboutMe']);

($userData[0]['role'] == 'admin') ? 
$memberPage->set("admin", "<li><a href='./admin.php'>Admin</a></li>") :
$memberPage->set("admin", '');

echo $memberPage->output();
?>