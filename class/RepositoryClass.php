<?php 
require_once("RepositoryTypeClass.php");
require_once("RepositoryOriginClass.php");

class Repository
{
    public int $id;
    public string $name;
    public string $repositoryName;
    public ?int $dependenciesId;
    public RepositoryType $repositoryType;
    public RepositoryOrigin $repositoryOrigin;

    function __construct(array $arr)
    {
        $this->id               = $arr['repositorio_id'];
        $this->name             = $arr['nombre'];
        $this->repositoryName   = $arr['nombre_repositorio'];
        $this->dependenciesId   = $arr['dependencia_id'];
        $this->repositoryType   = new RepositoryType($arr['tipo_repositorio_id'], $arr['tipo_repositorio_nombre']);
        $this->repositoryOrigin = new RepositoryOrigin($arr['tipo_origen_id'], $arr['tipo_origen_nombre']);
    }

    public function getType() : string
    {
        return gettype($this);
    }
}
?>