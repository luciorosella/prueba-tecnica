<?php 
require_once("ConnectionClass.php");

class RepositoryType
{
    public int $id;
    public string $name;

    function __construct($tipo_repositorio_id, $tipo_origen_nombre)
    {
        $this->id = $tipo_repositorio_id;
        $this->name = $tipo_origen_nombre;
    }
}
?>