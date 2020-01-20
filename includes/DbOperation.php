<?php
    header('Access-Control-Allow-Origin: *');
    class DbOperation
    {
        private $conn;
		
        //Constructor
        function __construct()
        {
            require_once dirname(__FILE__) . '/Config.php';
            require_once dirname(__FILE__) . '/DbConnect.php';
            // opening db connection
            $db = new DbConnect();
            $this->conn = $db->connect();
        }
        
        //www.url/getAllJoueurs
        //this method will return all the players in the database
        public function getAllJoueurs(){
            $stmt = $this->conn->prepare("SELECT * FROM Joueurs");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        //www.url/deuxiemeFunctionAPIAvecParametres
        public function getJoueurById($id){
			$result = $this->conn->query('SELECT * FROM Joueurs WHERE id ="'.$param1.'"');
			return $result;
        }
    }
