<?php
	session_start();

function __autoload( $classname )
{
	require_once( 'classes/' . $classname . '.php' );
}

	$logout	=	User::logout(); //de methode logout in class user

	if ( $logout )
	{
		$_SESSION[ 'error' ][ 'type' ]='succes';
        $_SESSION[ 'error' ][ 'text' ]='U bent uitgelogd. Tot de volgende keer';
		header( 'location: login.php' );
	}

?>