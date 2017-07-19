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


   if(isset($_FILES['file'])){
      $errors		= array();
      $file_name	= $_FILES['file']['name'];
      $file_size	= $_FILES['file']['size'];
      $file_tmp 	= $_FILES['file']['tmp_name'];
      $extension 	= pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

      $file_ext		= strtolower(end(explode('.',$_FILES['file']['name'])));
      $expensions	= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
        
        move_uploaded_file($file_tmp,"../upload/private/profile_".$userData[0]['username'].".".$extension);
        
        $ok = $dbClass->query('UPDATE members SET avatarUrl = :avatarUrl
    			WHERE id = :id',
    			array(
    			':id' => $userData[0]["id"], 
    			':avatarUrl' => "profile_".$userData[0]['username'].".".$extension,
    		));
        
        echo "Success";

      }else{
         print_r($errors);
      }
  }

     if(isset($_FILES['cv'])){
      $errors   = array();
      $file_name  = $_FILES['cv']['name'];
      $file_size  = $_FILES['cv']['size'];
      $file_tmp   = $_FILES['cv']['tmp_name'];
      $extension  = pathinfo($_FILES["cv"]["name"], PATHINFO_EXTENSION);

      $file_ext   = strtolower(end(explode('.',$_FILES['cv']['name'])));
      $expensions = array("pdf", "docx");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PDF file.";
      }
      
      if($file_size > 5097152) {
         $errors[]='File size must be excately 5 MB';
      }
      
      if(empty($errors)==true) {
        
        $mask = "../upload/private/cv/cv_".$userData[0]['username'].".*";
        array_map('unlink', glob($mask));
        
        move_uploaded_file($file_tmp,"../upload/private/cv/cv_".$userData[0]['username'].".".$extension);
        
        $ok = $dbClass->query('UPDATE members SET cv = :cv
          WHERE id = :id',
          array(
          ':id' => $userData[0]["id"], 
          ':cv' => "cv_".$userData[0]['username'].".".$extension,
        ));
        
        echo "Success";

      }else{
         print_r($errors);
      }
  }

  $facebook_link    = $_POST['facebook_link'];
  $linkedin_link    = $_POST['linkedin_link'];
  $googlePlus_link  = $_POST['googlePlus_link'];
  $youtube_link     = $_POST['youtube_link'];
  $industry         = $_POST['industry'];
  $voornaam         = $_POST['voornaam'];
  $achternaam       = $_POST['achternaam'];
  $email            = $_POST['email'];
  if (isset($_POST['scroldownswitch'])) {
    $scroldown = "yes";
  }else{
    $scroldown = "no";
  }

  $dbClass->query('UPDATE members 
  SET facebook_link     = :facebook_link,
   linkedin_link        = :linkedin_link,
   googlePlus_link      = :googlePlus_link,
   youtube_link         = :youtube_link,
   industry             = :industry,
   voornaam             = :voornaam,
   achternaam           = :achternaam,
   email                = :email,
   scroldown            = :scroldown
  WHERE id              = :members_id',
  array(
  ':members_id'         => $userData[0]["id"], 
  ':facebook_link'      => $facebook_link,
  ':linkedin_link'      => $linkedin_link, 
  ':googlePlus_link'    => $googlePlus_link, 
  ':youtube_link'       => $youtube_link, 
  ':industry'           => $industry,
  ':voornaam'           => $voornaam, 
  ':achternaam'         => $achternaam, 
  ':email'              => $email,
  ':scroldown'          => $scroldown  
));

   	header( 'location: ../mypage.php' );
	exit;
?> 