<?php


    class ArnesEngine {

        protected $view;
        protected $variabeles = array();
        
        /**
         * Inlade van template en zetten in variable $view
         * @param string $view 
         * @return type
         */
        public function __construct($view) {
            $this->view = $view;
        }
        
        /**
         * De key en de variable aan elkaar koppelen en in array plaatsen
         * @param string $key 
         * @param string|int|... $variable 
         * @return type
         */
        public function set($key, $variable) {
            $this->variabeles[$key] = $variable;
        }
        
        /**
         * 1. Kijken of template is ingeladen
         * 2. Zo ja, pak de content van de template en vervang de keys me de tags van de template
         * @return type
         */
        public function output() {

            if (!file_exists($this->view)) {
            	return "Voeg eerst een template toe ($this->view).<br />";
            }
            $output = file_get_contents($this->view);
            
            foreach ($this->variabeles as $key => $variable) {
            	$tagToReplace = "[@$key]";
            	$output = str_replace($tagToReplace, $variable, $output);
            }

            return $output;
        }
    }

?>