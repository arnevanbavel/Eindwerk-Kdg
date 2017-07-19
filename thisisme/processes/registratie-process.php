<?php
	session_start(); // sessie starten anders kunnen we variabelen niet op meerdere paginas gebruiken

function __autoload( $classname )
{
    require_once( '../classes/' . $classname . '.php' );
}

	if (isset( $_POST[ 'submit' ] )) {

		$email		=	$_POST[ 'email' ];			//email van formulier halen
        $password	=	$_POST[ 'password' ];		//paswoord van formulier halen
        $username	=	$_POST[ 'username' ];		//username van formulier halen
        $voornaam   =	$_POST[ 'voornaam' ];		//voornaam van formulier halen
        $achternaam	=	$_POST[ 'achternaam' ];		//achternaam van formulier halen

    
        $_SESSION[ 'registration' ][ 'email' ]		=	$email;			//Sessie multidem. array  email inzetten
        $_SESSION[ 'registration' ][ 'password' ]	=	$password;		//Sessie multidem. array  pasw inzetten

        $isEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL ); //validate emailadress geeft true or false terug

        if ( !$isEmail )		//geen goed email
        {
            $_SESSION[ 'error' ][ 'type' ]	= "error" ;
            $_SESSION[ 'error' ][ 'text' ]	= "Dit is geen geldig e-mailadres. Vul een geldig e-mailadres in." ; 
            header('location: ' . '../index.php' );
            exit();
		}	
        elseif ( $password == '' ) //paswoord leeg
        {
            $_SESSION[ 'error' ][ 'type' ]	= "password" ;
            $_SESSION[ 'error' ][ 'text' ]	= "Dit is geen geldig paswoord. Vul een geldig paswoord in."; 
            header('location: ../index.php' );
            exit();
        }
 		elseif ( $voornaam == '' )	//voornaam leeg
        {
            $_SESSION[ 'error' ][ 'type' ]	= "voornaam" ;
            $_SESSION[ 'error' ][ 'text' ]	= "Vul een voornaam in."; 
            header('location: ../index.php' );
            exit();
        }
        elseif ( $achternaam == '' )	//achternaam leeg
        {
            $_SESSION[ 'error' ][ 'type' ]	= "achternaam" ;
            $_SESSION[ 'error' ][ 'text' ]	= "Vul een achternaam in."; 
            header('location: ../index.php' );
            exit();
        }
        else
        {
            $dbClass = new Database();
			$userDataEmail	      =	$dbClass->query( 'SELECT * FROM members 
                                                        WHERE email = :email', 
                                                        array(':email' => $email ) 
                                                    );

            $userDataUsername     =   $dbClass->query( 'SELECT * FROM members 
                                                        WHERE username = :username', 
                                                        array(':username' => $username ) 
                                                    ); 
		}
		if ($userDataEmail[0]["email"] == $email) 
		{		//Kijken of email al gevonden is
			$_SESSION[ 'error' ][ 'type' ] = "error";
			$_SESSION[ 'error' ][ 'text' ] = "Dit email adress is al in gebruik";	
			header('location: ../index.php' );
            exit();
		}
		elseif($userDataUsername[0]["username"] == $username) 
		{		//Kijken of email al gevonden is
			$_SESSION[ 'error' ][ 'type' ] = "error";
			$_SESSION[ 'error' ][ 'text' ] = "Deze username is al in gebruik";	
			header('location: ../index.php' );
            exit();
		}
		else
        {   

            $db         =      $dbClass->getDb();
        	$USER       =      new User();
        	$newUser	=     $USER->CreateNewUser( $db, $email, $password, $username, $voornaam, $achternaam);   // class voor toevoegen nieuwe user

            $userId     =   $dbClass->query( 'SELECT * FROM members 
                                                        WHERE username = :username', 
                                                        array(':username' => $username ) 
                                                    );

            $newSkill        =     $USER->SkillDummy( $dbClass, $userId[0]['id']);   // class voor toevoegen nieuwe user
            $newPortfolio    =     $USER->PortfolioDummy( $dbClass, $userId[0]['id']);   // class voor toevoegen nieuwe user
            if ( $newUser && $newSkill && $newPortfolio )
            {
                $_SESSION[ 'error' ][ 'type' ]  = "succes" ;
                $_SESSION[ 'error' ][ 'text' ]  = "Welkom, u bent vanaf nu geregistreerd in onze app.";
                header('location: ../mypage.php' );
                exit();
            }
        }     
	}
?>