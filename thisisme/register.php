<?php
session_start(); 

function __autoload( $classname )
{
	require_once( 'classes/' . $classname . '.php' );
}

$registerPage = new ArnesEngine("views/register.tpl");
echo $registerPage->output();
?>