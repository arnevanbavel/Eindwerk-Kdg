<?php

session_start();

function __autoload( $classname )
{
	require_once( '../classes/' . $classname . '.php' );
}

	if ( isset( $_POST[ 'submit' ] ) )
	{
		$username 	=	$_POST[ 'username' ];
		$password	=	$_POST[	'password' ];
		
		$dbClass 	= 	new Database();
		$userData	=	$dbClass->query( 'SELECT * FROM members 
											WHERE username = :username',
											array(':username' => $username ) 
										);

		if( !empty($userData) ) //komt hier als er data is in userData
		{
			if ($userData[0][ 'username' ] == $username) { //username correct

				$salt 		= 	$userData[0]['salt'];
				$passwordDb = 	$userData[0]['password'];

				$newlyHashedPassword = hash( 'sha512', $salt . $password);

				if ($userData[0][ 'password' ] == $newlyHashedPassword) 
				{	
					$USER = new User();
					$loginUser	=	$USER->createCookie( $salt, $username ); //nieuwe cookie aanmaken verlengen van datum
					
					if ( $loginUser )
					{
						$_SESSION[ 'error' ][ 'type' ] = "succes";
                        $_SESSION[ 'error' ][ 'text' ] = "Welkom, u bent ingelogd.";
						header('location: ../mypage.php');
						exit();
					}
				}
				else 
				{
					$_SESSION[ 'error' ][ 'type' ] = "error";
                    $_SESSION[ 'error' ][ 'text' ] = "U kon niet ingelogd worden. Probeer opnieuw.";
					header('location: ../login.php');
					exit();
				}
			}
			else 
			{
				$_SESSION[ 'error' ][ 'type' ] = "error";
                $_SESSION[ 'error' ][ 'text' ] = "U kon niet ingelogd worden. Probeer opnieuw.";
				header('location: ../login.php');
				exit();
			}
		}
		else 
		{
			$_SESSION[ 'error' ][ 'type' ] = "error";
            $_SESSION[ 'error' ][ 'text' ] = "U kon niet ingelogd worden. Probeer opnieuw.";
			header('location: ../login.php');
			exit();
		}	

	}
?>