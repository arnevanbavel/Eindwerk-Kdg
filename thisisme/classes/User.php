<?php
	
	/**
	 * 
	 */
	class User
	{
		/**
		 * Maakt een nieuwe user aan na registratie
		 * @param instance $db 
		 * @param string $email 
		 * @param string $password 
		 * @param string $telefoon 
		 * @param string $username 
		 * @param string $voornaam 
		 * @param string $achternaam 
		 * @return bool
		 */
		public function CreateNewUser( $db,$email, $password, $username, $voornaam, $achternaam)
		{
			$salt = uniqid(mt_rand(), true);                             //willekeurge salt
			$hashedPassword	=	hash( 'sha512', $salt . $password );   //sha512-heashed paswoord + salt
			$date = date("d F Y");
			$query = 	'INSERT INTO members (username, 
											voornaam, 
											achternaam,
											memberSince,
											avatarUrl, 
											email, 
											salt, 
											password, 
											role,
											header_section,
											header_image,
											header_bigSentence,
											header_smallSentence,
											profiel_section,
											profiel_aboutMe,
											skill_section,
											skill_background,
											skill_color,
											ervaring_section,
											portfolio_section,
											portfolio_background_color,
											portfolio_color)
						VALUES(:username,
						 :voornaam,
						 :achternaam,
						 :memberSince,
						 :avatarUrl,
						 :email,
						 :salt,
						 :password,
						 :role,
						 :header_section,
						 :header_image,
						 :header_bigSentence,
						 :header_smallSentence,
						 :profiel_section,
						 :profiel_aboutMe,
						 :skill_section,
						 :skill_background,
						 :skill_color,
						 :ervaring_section,
						 :portfolio_section,
						 :portfolio_background_color,
						 :portfolio_color)';
			$statement = $db->prepare($query);
			$statement->bindValue(':username',$username);
			$statement->bindValue(':voornaam',$voornaam);
			$statement->bindValue(':achternaam',$achternaam);
			$statement->bindValue(':memberSince',$date);
			$statement->bindValue(':avatarUrl','profile_default_alien.png');
			$statement->bindValue(':email',$email);
			$statement->bindValue(':salt',$salt);
			$statement->bindValue(':password',$hashedPassword);
			$statement->bindValue(':role', "user");
			$statement->bindValue(':header_section', "default_tmp");
			$statement->bindValue(':header_image', "./assets/img/header_backgrounds/default_tmp.jpg");
			$statement->bindValue(':header_bigSentence', "Hi, I'm ".$voornaam);
			$statement->bindValue(':header_smallSentence', "Scroll down to learn more about me");
			$statement->bindValue(':profiel_section', "default_tmp");
			$statement->bindValue(':profiel_aboutMe', "Hello visitor, My name is ".$voornaam.". I create websites that help people succeed. When i'm not working I like to explorer our beautifull planet. Scroll even more down to chech out my skills and portfolio");
			$statement->bindValue(':skill_section', "default_tmp");
			$statement->bindValue(':skill_background', "#ffffff");
			$statement->bindValue(':skill_color', "#3f4c55");
			$statement->bindValue(':ervaring_section', "default_tmp");
			$statement->bindValue(':portfolio_section', "default_tmp");
			$statement->bindValue(':portfolio_background_color', "#f2f2f2");
			$statement->bindValue(':portfolio_color', "#3f4c55");

			$statement->execute();
			//$cookie = setcookie('authenticated', $username, time() - 3600 );
			$cookie = self::createCookie($salt, $username ); //cookie aanmaken
			return $cookie;
		}

		/**
		 * inseten of updaten van acces tokens
		 * @param instance $db 
		 * @param string $token 
		 * @param string $userid 
		 * @param string $tokenmembers_id 
		 * @return string
		 */
		public function saveToken( $db, $token, $userid, $tokenmembers_id)
		{
			if ($tokenmembers_id == '') 
			{
				$query = 	'INSERT INTO tokens (members_id, linkedinAccesToken)
							VALUES(:members_id, :linkedinAccesToken)';
			}
			else
			{
				$query = 	'UPDATE tokens SET linkedinAccesToken = :linkedinAccesToken WHERE members_id = :members_id';
			}
			$statement = $db->prepare($query);
			echo'hallo';
			$statement->bindValue(':members_id',$userid);
			$statement->bindValue(':linkedinAccesToken',$token);

			$statement->execute();
		}

		/**
		 * Aanmaken van authenticated cookie
		 * @param string $salt 
		 * @param string $username 
		 * @return bool
		 */
		public function createCookie( $salt, $username )
		{
						// Cookie aanmaken
			$hashedusername	=	hash( 'sha512', $salt . $username ); //hashes username + salt
			$cookieValue	=	$username . ',' . $hashedusername;

			$cookie	=	setcookie( 'authenticated', $cookieValue, time() + (86400 * 30), '/' ); //cookie van 30 dagen
			return $cookie;
		}

		/**
		 * Aanmaken van authenticated cookie
		 * @param string $salt 
		 * @param string $username 
		 * @return bool
		 */
		public function SkillDummy($db, $id)
		{
			$db->query( "INSERT INTO skills ( members_id, skill_position, skill_title, skill_score, skill_color) 
            VALUES ( :members_id, :skill_position, :skill_title, :skill_score, :skill_color)",  
            array(':members_id' => $id,':skill_position' => '1',':skill_title' => 'Dancing',':skill_score' => '90',':skill_color' => '#01b888'));
            $db->query( "INSERT INTO skills ( members_id, skill_position, skill_title, skill_score, skill_color) 
            VALUES ( :members_id, :skill_position, :skill_title, :skill_score, :skill_color)",  
            array(':members_id' => $id,':skill_position' => '1',':skill_title' => 'Problem Solving',':skill_score' => '85',':skill_color' => '#01b888'));
   			$db->query( "INSERT INTO skills ( members_id, skill_position, skill_title, skill_score, skill_color) 
            VALUES ( :members_id, :skill_position, :skill_title, :skill_score, :skill_color)",  
            array(':members_id' => $id,':skill_position' => '1',':skill_title' => 'Photgrapy',':skill_score' => '65',':skill_color' => '#01b888'));
            $db->query( "INSERT INTO skills ( members_id, skill_position, skill_title, skill_score, skill_color) 
            VALUES ( :members_id, :skill_position, :skill_title, :skill_score, :skill_color)",  
            array(':members_id' => $id,':skill_position' => '1',':skill_title' => 'Html 5',':skill_score' => '75',':skill_color' => '#01b888'));
            $db->query( "INSERT INTO skills ( members_id, skill_position, skill_title, skill_score, skill_color) 
            VALUES ( :members_id, :skill_position, :skill_title, :skill_score, :skill_color)",  
            array(':members_id' => $id,':skill_position' => '1',':skill_title' => 'Sharing Love',':skill_score' => '100',':skill_color' => '#01b888'));
            return true;
		}

		public function PortfolioDummy($db, $id)
		{
			$db->query( "INSERT INTO portfolios ( members_id, title, caption, extra, image, link) 
            VALUES ( :members_id, :title, :caption, :extra, :image, :link)",  
            array(':members_id' => $id,':title' => 'Rain Forest',':caption' => 'Photgraphy',':extra' => ':-)',':image' => './assets/img/placeholder.png',':link' => ''));
            $db->query( "INSERT INTO portfolios ( members_id, title, caption, extra, image, link) 
            VALUES ( :members_id, :title, :caption, :extra, :image, :link)",  
            array(':members_id' => $id,':title' => 'Startup Framework',':caption' => 'Website Design',':extra' => ':-)',':image' => './assets/img/placeholder.png',':link' => ''));
            $db->query( "INSERT INTO portfolios ( members_id, title, caption, extra, image, link) 
            VALUES ( :members_id, :title, :caption, :extra, :image, :link)",  
            array(':members_id' => $id,':title' => 'Houses',':caption' => 'Graphic Design',':extra' => ':-)',':image' => './assets/img/placeholder.png',':link' => ''));
            return true;
		}

		/**
		 * 
		 * @param instance $db 
		 * @param string $username 
		 * @return array
		 */
		public function toonInfo($db ,$username )
		{				
			$userData	=	$db->query( 'SELECT * FROM members WHERE username = :username', array(':username' => $username ) );
			return $userData;
		}

		public function logout()
		{
			$unsetCookie 	=	setcookie( 'authenticated', '', 0 , '/'); //unsetten van cookie
			return $unsetCookie;
		}

		public function deleteUser($db ,$username )
		{				
			$db->query( 'DELETE FROM members WHERE username = :username', array(':username' => $username ) );
		}

		/**
		 * Kijkt of een user wel op een bepaalde pagina mag komen, dat de user zich wel heeft ingelogt
		 * @param instance $db 
		 * @return bool
		 */
		public function validate($db)
		{
			if ( isset( $_COOKIE['authenticated'] ) ) 
			{
				$userData		=	explode( ',', $_COOKIE['authenticated'] ); //explode sheid een string bij ','
				$username		= 	$userData[0];       //username adress
				$saltedUsername	= 	$userData[1];       //gesalted username adress
				
				$userDataAuth	=	$db->query( 'SELECT * FROM members 
														WHERE username = :username', 
														array(':username' => $username ) 
													);	//alle info van user
				if( !empty( $userDataAuth ) )
				{
					$salt = $userDataAuth[0]['salt'];
					$newlySaltedUsername 	= hash( 'sha512' , $salt . $username ); 

					if ( $newlySaltedUsername == $saltedUsername ) //kijken of of username db en cookie gelijk zijn
					{
						// Cookie is correct
						$cookieValue	=	$username . ',' . $saltedUsername;
						setcookie( 'authenticated', $cookieValue, time() + (86400 * 30), '/' ); //cookie van 30 dagen
						return true;
					}
					else
					{
						// Password niet correct
						return false;
					}
				}
				else
				{
					// User niet gevonden
					return false;
				}
			}
			else
			{
				//Cookie niet geset
				return false;
			}

		}
	}

?>