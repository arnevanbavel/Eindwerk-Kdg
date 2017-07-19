<?php
	/**
	* 
	*/
	class Template
	{
		//Headers Paths
		Protected $header 			= "./templates/headers/";
		Protected $createHeader 	= "./templatescreate/headers/";
		Protected $createHeaderCSS 	= "./templatescreate/headers/css/";
		Protected $createHeaderJS 	= "./templatescreate/headers/js/";
		//profiel Paths
		Protected $profiel 			= "./templates/profiels/";
		Protected $createProfiel 	= "./templatescreate/profiels/";
		Protected $createProfielCSS = "./templatescreate/profiels/css/";
		Protected $createProfielJS 	= "./templatescreate/profiels/js/";
		//Skill Paths
		Protected $skill 			= "./templates/skills/";
		Protected $createSkill  	= "./templatescreate/skills/";
		Protected $createSkillCSS  	= "./templatescreate/skills/css/";
		Protected $createSkillJS  	= "./templatescreate/skills/js/";
		//portfolio Paths
		Protected $portfolio 			= "./templates/portfolios/";
		Protected $createPortfolio 		= "./templatescreate/portfolios/";
		Protected $createPortfolioCSS   = "./templatescreate/portfolios/css/";
		Protected $createPortfolioJS  	= "./templatescreate/portfolios/js/";
		//ervaring Paths
		Protected $ervaring			= "./templates/ervaringen/";
		Protected $createErvaringen	= "./templatescreate/ervaringen/";

		public function __construct( )	
		{

		}
		/**************************** HEADERS ***************************************/
		public function getheader ($headerName)
		{
			$header = file_get_contents( $this->header.$headerName.".html");
			return $header;
		}

		public function getCreateHeaders ()
		{
			$headers = array();
			$headersPaths = glob($this->createHeader.'*.html');
			foreach ($headersPaths as $headersPath) 
			{
				$headers[] = file_get_contents($headersPath);
			}				
			return $headers;
		}

		public function getCreateHeadersCSS()
		{
			$headers = array();
			$headersPaths = glob($this->createHeaderCSS.'*.css');			
			return $headersPaths;
		}

		public function getCreateHeadersJS()
		{
			$headers = array();
			$headersPaths = glob($this->createHeaderJS.'*.js');			
			return $headersPaths;
		}

		/**************************** PROFIEL ***************************************/

		public function getprofiel ($profielName)
		{
			$profiel = file_get_contents( $this->profiel.$profielName.".html");
			return $profiel;
		}

		public function getCreateProfiels()
		{
			$profiels = array();
			$profielsPaths = glob($this->createProfiel.'*.html');
			foreach ($profielsPaths as $profielsPath) 
			{
				$profiels[] = file_get_contents($profielsPath);
			}				
			return $profiels;
		}

		public function getCreateProfielsCSS()
		{
			$profiels = array();
			$profielsPaths = glob($this->createProfielCSS.'*.css');			
			return $profielsPaths;
		}

		public function getCreateProfielsJS()
		{
			$profiels = array();
			$profielsPaths = glob($this->createProfielJS.'*.js');			
			return $profielsPaths;
		}

		/**************************** SKILL ***************************************/

		public function getskill ($skillName)
		{
			$skill = file_get_contents( $this->skill.$skillName.".html");
			return $skill;
		}

		public function getskillData ($userID, $db)
		{
			$skillData	=	$db->query("SELECT skills.* FROM members
				                            JOIN skills
				                            ON members.id = skills.members_id
				                            WHERE members.id = :id", 
				                    array(':id' => $userID));
			return $skillData;
		}

		public function getCreateskills($skillName)
		{
			$skill = file_get_contents( $this->createSkill.$skillName.".html");
			return $skill;
		}

		public function getCreateskillsCSS()
		{
			$skills = array();
			$skillsPaths = glob($this->createSkillCSS.'*.css');			
			return $skillsPaths;
		}

		public function getCreateskillsJS()
		{
			$skills = array();
			$skillsPaths = glob($this->createSkillJS.'*.js');			
			return $skillsPaths;
		}

		/**************************** PORTFOLIO ***************************************/

		public function getportfolio($portfolio)
		{
			$portfolio = file_get_contents( $this->portfolio.$portfolio.".html");
			return $portfolio;
		}

		public function getportfolioHead($portfolio)
		{
			$portfolioHead = file_get_contents( $this->portfolio.$portfolio."_head.html");
			return $portfolioHead;
		}

		public function getportfolioFoot($portfolio)
		{
			$portfolioFoot = file_get_contents( $this->portfolio.$portfolio."_foot.html");
			return $portfolioFoot;
		}

		public function getportfolioData ($userID, $db)
		{
			$portfolioData	=	$db->query("SELECT portfolios.* FROM members
				                            JOIN portfolios
				                            ON members.id = portfolios.members_id
				                            WHERE members.id = :id", 
				                    array(':id' => $userID));
			return $portfolioData;
		}

		public function getCreateportfolios()
		{
			$portfolios = array();
			$portfoliosPaths = glob($this->createPortfolio.'*.html');
			foreach ($portfoliosPaths as $portfoliosPath) 
			{
				$portfolios[] = file_get_contents($portfoliosPath);
			}				
			return $portfolios;
		}

		public function getCreateportfoliosCSS()
		{
			$portfolio = array();
			$portfolioPaths = glob($this->createPortfolioCSS.'*.css');			
			return $portfolioPaths;
		}

		public function getCreateportfoliosJS()
		{
			$portfolio = array();
			$portfolioPaths = glob($this->createPortfolioJS.'*.js');			
			return $portfolioPaths;
		}



	}
?>