<?php
	define("HOST", "127.0.0.1:3308");
	define("USER", "Lucio");
	define("PASSWORD", "lucio1992");
	define("DATABASE", "ampliffy");
	define("SECURE", TRUE);
	define("TIPOBASE", "mysqli");

class Conexion extends PDO
{ 
    private string $tipobase = TIPOBASE;       
	private string $host = HOST;
	private string $database = DATABASE;
	private string $user = USER;             
	private string $password = PASSWORD;

	public function __construct() 
	{
		try
		{
        	parent::__construct('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        	$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      	}catch(PDOException $e)
      	{
        	return $e->getMessage();
      	}
   	}
}
?>