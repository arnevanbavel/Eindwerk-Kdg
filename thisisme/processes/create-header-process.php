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

$selectedTemplate 		=	$_POST[ 'selectedTemplate' ];
$header_bigSentence		=	$_POST[	'header_bigSentence' ];
$header_smallSentence	=	$_POST[	'header_smallSentence' ];

if(isset($_POST['default_header_image']) == 'default'){
	$header_image = './assets/img/header_backgrounds/'.$selectedTemplate.'.jpg';
}else{

	if(isset($_FILES['header_upload_image'])){
      $errors		= array();
      $file_name	= $_FILES['header_upload_image']['name'];
      $file_size	= $_FILES['header_upload_image']['size'];
      $file_tmp 	= $_FILES['header_upload_image']['tmp_name'];
      $extension 	= pathinfo($_FILES["header_upload_image"]["name"], PATHINFO_EXTENSION);

      $file_ext		= strtolower(end(explode('.',$_FILES['header_upload_image']['name'])));
      $expensions	= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be lower than 2 MB';
      }
      
      if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"../upload/private/headerBG_".$userData[0]['username'].".".$extension);
        $header_image = "./upload/private/headerBG_".$userData[0]['username'].".".$extension;

      }else{
         print_r($errors);
      }
  }else{
    $header_image = './assets/img/header_backgrounds/'.$selectedTemplate.'.jpg';
  }
}

$dbClass->query('UPDATE members 
	SET header_section 		= :header_section,
	 header_image 			= :header_image,
	 header_bigSentence 	= :header_bigSentence,
	 header_smallSentence 	= :header_smallSentence
	WHERE id 				= :members_id',
	array(
	':members_id' 			=> $userData[0]["id"], 
	':header_section' 		=> $selectedTemplate,
	':header_image' 		=> $header_image, 
	':header_bigSentence' 	=> $header_bigSentence, 
	':header_smallSentence' => $header_smallSentence 
));

header( 'location: ../mypage.php' );
exit;


?>