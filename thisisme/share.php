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

if (isset($_GET['username'])) {
  	$memberData =   $_GET['username'];
   	$memberData =   $USER->toonInfo($dbClass, $memberData);
}
else
{
    header( 'location: index.php' );
}

$random = rand(1,1000);
$random = "?id=".$random;

$template = new Template();
//::::::::::HEADER
$headerHTML     = $template->getheader($memberData[0]["header_section"]);
$headerCSS      = "./templates/headers/css/".$memberData[0]["header_section"].".css";
$headerJS       = "./templates/headers/js/".$memberData[0]["header_section"].".js";

//::::::::::PROFIEL
$profielHTML    = $template->getprofiel($memberData[0]["profiel_section"]);
$profielCSS     = "./templates/profiels/css/".$memberData[0]["profiel_section"].".css";
$profielJS      = "./templates/profiels/js/".$memberData[0]["profiel_section"].".js";

//::::::::::SKILL
$skillHTML      = $template->getskill($memberData[0]["skill_section"]);
$skillCSS       = "./templates/skills/css/".$memberData[0]["skill_section"].".css";
$skillJS        = "./templates/skills/js/".$memberData[0]["skill_section"].".js";
$skillArray     = $template->getskillData($memberData[0]["id"], $dbClass);
$skillAllHTML   ="";
$skillcount     = 0;
foreach ($skillArray as $skill) {
    $skillVan       = array("[@skillTitle]", "[@skillScore]", "[@skillColor]");
    $skillNaar      = array("[@skillTitle".$skillcount."]", "[@skillScore".$skillcount."]", "[@skillColor".$skillcount."]");
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
$sharePage = new ArnesEngine("views/share.tpl");

//CSS
$sharePage->set("headerCSS", $headerCSS);
$sharePage->set("profielCSS", $profielCSS);
$sharePage->set("skillCSS", $skillCSS);
$sharePage->set("portfolioCSS", $portfolioCSS);
//HTML
$sharePage->set("headerHTML", $headerHTML);
$sharePage->set("profielHTML", $profielHTML);
$sharePage->set("skillHTML", $skillAllHTML);
$sharePage->set("portfolioWrapHead", $portfolioHTMLHead);
$sharePage->set("portfolioHTML", $portfolioAllHTML);
$sharePage->set("portfolioWrapFoot", $portfolioHTMLFoot);
//JS
$sharePage->set("headerJS", $headerJS);
$sharePage->set("profielJS", $profielJS);
$sharePage->set("skillJS", $skillJS);
$sharePage->set("portfolioJS", $portfolioJS);

($memberData[0]['scroldown'] == 'yes') ? $sharePage->set("scroldown", "") : $sharePage->set("scroldown", 'none');

($memberData[0]['cv'] != '') ? 
$sharePage->set("cv", "<p>Resume: <a href='./upload/private/cv/".$memberData[0]['cv']."' download='".$memberData[0]['cv']."'>Download</a></p>") :
$sharePage->set("cv", '');

$sharePage->set("voornaam", $memberData[0]['voornaam']);
$sharePage->set("achternaam", $memberData[0]['achternaam']);
$sharePage->set("username", $memberData[0]['username']);
$sharePage->set("avatarUrl", "./upload/private/".$memberData[0]['avatarUrl'].$random);
$sharePage->set("skillClass", $memberData[0]["skill_section"]);
$sharePage->set("skillBackground", $memberData[0]["skill_background"]);
$sharePage->set("skillColor", $memberData[0]["skill_color"]);

$skillcount     = 0;
foreach ($skillArray as $skill => $value) {
    $sharePage->set("skillTitle".$skillcount, $value["skill_title"]);
    $sharePage->set("skillScore".$skillcount, $value["skill_score"]);
    $sharePage->set("skillColor".$skillcount, $value["skill_color"]);
    ++$skillcount;
}

$portfoliocount     = 0;
foreach ($portfolioArray as $portfolio => $value) {
    $sharePage->set("portfolio_link".$portfoliocount, $value["link"]);
    $sharePage->set("portfolio_extra".$portfoliocount, $value["extra"]);
    if (file_exists($value["image"])) {
        $sharePage->set("portfolio_img".$portfoliocount, $value["image"].$random);
    }else
    {
        $sharePage->set("portfolio_img".$portfoliocount, "./assets/img/placeholder.png");
    }
    $sharePage->set("portfolio_title".$portfoliocount, $value["title"]);
    $sharePage->set("portfolio_caption".$portfoliocount, $value["caption"]);
    ++$portfoliocount;
}
$sharePage->set("portfolio_background_color", $memberData[0]["portfolio_background_color"]);
$sharePage->set("portfolio_color", $memberData[0]["portfolio_color"]);

($memberData[0]['facebook_link'] != '') ? 
$sharePage->set("facebook_link", "<a href='".$memberData[0]['facebook_link']."'><img src='./assets/img/social/Facebook.svg'></a>") :
$sharePage->set("facebook_link", '');
($memberData[0]['linkedin_link'] != '') ? 
$sharePage->set("linkedin_link", "<a href='".$memberData[0]['linkedin_link']."'><img src='./assets/img/social/Linkedin.svg'></a>") :
$sharePage->set("linkedin_link", '');
($memberData[0]['googlePlus_link'] != '') ? 
$sharePage->set("googlePlus_link", "<a href='".$memberData[0]['googlePlus_link']."'><img src='./assets/img/social/Google+.svg'></a>") :
$sharePage->set("googlePlus_link", '');
($memberData[0]['youtube_link'] != '') ? 
$sharePage->set("youtube_link", "<a href='".$memberData[0]['youtube_link']."'><img src='./assets/img/social/YouTube.svg'></a>") :
$sharePage->set("youtube_link", '');

$sharePage->set("header_image", 'background-image:url('.$memberData[0]['header_image'].$random.');');
$sharePage->set("header_bigSentence", $memberData[0]['header_bigSentence']);
$sharePage->set("header_smallSentence", $memberData[0]['header_smallSentence']);
$sharePage->set("profiel_aboutMe", $memberData[0]['profiel_aboutMe']);

echo $sharePage->output();
 
?>