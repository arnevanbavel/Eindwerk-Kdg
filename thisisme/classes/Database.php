<?php
	/**
	* 
	*/
	class Database
	{
		
		private $db;
		Protected $username = "root";
		Protected $password = "";

		
		/**
		 * Constructor die connectie maakt met de database
		 * @return connection
		 */
		public function __construct( )	
		{
			try
				{
					$this->db = new PDO('mysql:host=localhost;dbname=dbeindwerk', $this->username, $this->password); // Connectie maken
					$messageContainer	=	'Connectie dmv PDO succesvol.';
				}
			catch ( PDOException $e )
				{
					$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
				}
			return $this->db;
		}

		/**
		 * Om bijvoorbeeld alle users uit een tabel te selecteren
		 * @param string(query) $sql 
		 * @param array|bool $tokens 
		 * @return array
		 */
		public function query( $sql , $tokens = false ) //$tokens = false
		{  		
			$statement = $this->db->prepare( $sql );
			
			if ( $tokens )
			{
				foreach ( $tokens as $token => $tokenValue )
				{
					$statement->bindValue( $token, $tokenValue );
				}
			}

			$ok = $statement->execute();
			
			$fieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
			{
				$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
			}

			$data	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$data[]	=	$row;
			}

			$returnArray['fieldnames']	=	$fieldnames;
			$returnArray['data']		=	$data;

			return $data;
		}

		/**
		 * Get database connectie
		 * @return object
		 */
		public function getDb ()
		{
			if ($this->db instanceof PDO) 
			{
            	return $this->db;
       		}

		}

	}
?>