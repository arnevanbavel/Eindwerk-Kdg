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

$dbClass->query( "DELETE FROM portfolios
                    WHERE members_id = :members_id",
                    array(':members_id' => $userData[0]["id"] ));

$i = 0;
while ( $i <= 6) {
echo $i;
    if(file_exists($_FILES['image'.$i]['tmp_name'])) 
    {
      $errors       = array();
      $file_name    = $_FILES['image'.$i]['name'];
      $file_size    = $_FILES['image'.$i]['size'];
      $file_tmp     = $_FILES['image'.$i]['tmp_name'];
      $extension    = pathinfo($_FILES['image'.$i]["name"], PATHINFO_EXTENSION);

      $file_ext     = strtolower(end(explode('.',$_FILES['image'.$i]['name'])));
      $expensions   = array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"../upload/private/portfolio_".$userData[0]['username']."_".$i.".".$extension);
        $image = "./upload/private/portfolio_".$userData[0]['username']."_".$i.".".$extension;
        echo "Success";
      }else{
         print_r($errors);
      }
   }
   else
   {
        $isThereAnImage = glob("../upload/private/portfolio_".$userData[0]['username']."_".$i.".*");
        echo $isThereAnImage[0];
        if ($isThereAnImage[0]) {
            echo $isThereAnImage[0];
            $image = substr($isThereAnImage[0], 1);            
        } else {
            $image = "./assets/img/placeholder.png";
        }
   }

    $title       = isset($_POST["title".$i]) ? $_POST["title".$i] : false;
    $caption     = isset($_POST["caption".$i]) ? $_POST["caption".$i] : false;
    $extra       = isset($_POST["extra".$i]) ? $_POST["extra".$i] : '';
    $link        = isset($_POST["link".$i]) ? $_POST["link".$i] : "";

    if ($title == false || $caption == false ) {
        echo "Vul een titel en of caption in";
        $DelFilePath = glob("../upload/private/portfolio_".$userData[0]['username']."_".$i.".*");
        if (file_exists($DelFilePath[0])) { unlink ($DelFilePath[0]); }
    } 
    else {
        $ok = $dbClass->query( "
                INSERT INTO portfolios ( members_id, title, caption, extra, link, image) 
                VALUES ( :members_id, :title, :caption, :extra, :link, :image)",  
                array(
                ':members_id' => $userData[0]['id'],
                ':title' => $title,
                ':caption' => $caption,
                ':extra' => $extra,
                ':link' => $link,
                ':image' => $image
                )); 
    }       
    $i++;
}

$dbClass->query('UPDATE members 
    SET portfolio_section       = :portfolio_section,
    portfolio_background_color  = :portfolio_background_color,
    portfolio_color             = :portfolio_color
    WHERE id = :members_id',
    array(
    ':members_id' => $userData[0]["id"], 
    ':portfolio_section'            => $_POST["selectedTemplate"],
    ':portfolio_background_color'   => $_POST["portfolio_background_color"],
    ':portfolio_color'              => $_POST["portfolio_color"],
));
header( 'location: ../mypage.php' );
exit();

/*
    $ok = $dbClass->query( "
                INSERT INTO portfolios ( members_id, title, caption, extra) 
                VALUES ( :members_id, :title, :caption, :extra)",  
                array(
                ':members_id' => $userData[0]['id'],
                ':title' => 'Test',
                ':caption' => 'yeah baby',
                ':extra' => 'hihi'
                )); 

*/

?>