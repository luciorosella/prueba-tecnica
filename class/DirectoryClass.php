<?php 
require_once("ConnectionClass.php");

class Directories
{
    function __construct()
    {
        
    }

    public function getNameDirectory() : array
    {
        try
        {
            $db = new Conexion();
            $query = $db->prepare("SELECT * FROM view_estructura");
			$query->execute();
            
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $e) 
        {
            return [$e->getMessage()];
        }
    }

    public function getDirectoryByName(string $name) : array
    {
        try
        {
            $db = new Conexion();
            $query = $db->prepare("SELECT repositorios.id, repositorios.nombre, repositorios.nombre_repositorio
            FROM view_estructura
            LEFT JOIN repositorios ON view_estructura.dependencia_id = repositorios.id
            WHERE view_estructura.nombre_repositorio = :nombre_repositorio");
			$query->execute(array(
                ':nombre_repositorio' => $name
            ));
            
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $e) 
        {
            return [$e->getMessage()];
        }
    }
}
?>