<?php
session_start(); 

function __autoload( $classname )
{
	require_once( 'classes/' . $classname . '.php' );
}

$LoginPage = new ArnesEngine("views/login.tpl");
echo $LoginPage->output();
?>