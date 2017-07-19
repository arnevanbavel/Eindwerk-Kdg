<?php
session_start();

function __autoload( $classname )
{
	require_once( 'classes/' . $classname . '.php' );
}

$landingsPage = new ArnesEngine("views/index.tpl");
echo $landingsPage->output();
 
?>