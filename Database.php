<?php
  class Database {
		

		protected $_config;

		private $dbc;
		private static $instance = null;
		private $result = null ;
		private $stmt;

		public function __construct() {

			$this->_config = array('driver' => 'mysql','host' => 'localhost','dbname' => 'cervezaphp2','username' => 'root','password' => '');
			$this->getPDOConnection();
		}

		public function __destruct(){

			$this->dbc = NULL ;
		}

		public static function getInstance(){
      
		if (Database::$instance == null)
			Database::$instance = new Database();
			
		return Database::$instance;
		}

		private function getPDOConnection() {

			if ($this->dbc == NULL) {

				$dsn = "" .
					$this->_config['driver'] .
					":host=" . $this->_config['host'] .
					";dbname=" . $this->_config['dbname'];
				try {

					$this->dbc = new PDO( $dsn, $this->_config[ 'username' ], $this->_config[ 'password' ] );

				} catch( PDOException $e ) {

					echo _LINE_.$e->getMessage();
				}
			}
		}

		public function runQuery($sql, $parameters = []) {

			$this->result = $this->dbc->prepare($sql);
			$this->result->execute($parameters);

			
			return $this->result;
		}

		public function getObject($cls = "StdClass"){

			if (is_null($this->result)) return null ;

			return $this->result->fetchObject($cls) ;
		}

		public function __wakeup(){

			$this->connect() ;
		}
	}

?>












