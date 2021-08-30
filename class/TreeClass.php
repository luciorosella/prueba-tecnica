<?php 
require_once("DirectoryClass.php");
require_once("RepositoryClass.php");

class Tree
{
    function __construct()
    {
        
    }

    function treeRepository(array $repositorys, int $parentId = 0) : array
    {
        $data = array();
    
        foreach ($repositorys as $value):
            $oRepositorys = new Repository($value);
            
            if ($oRepositorys->dependenciesId == $parentId):
                $dependencies = $this->treeRepository($repositorys, $oRepositorys->id);
                
                if ($dependencies)
                    $oRepositorys->dependencies = $dependencies;

                array_push($data, $oRepositorys);
            endif;
        endforeach;
    
        return $data;
    }

    public function index() : array
    {
        try
        {
            $oDirectories = new Directories();
            $aDirectoriesName = $oDirectories->getNameDirectory();

            $treeRepository = $this->treeRepository($aDirectoriesName);
          
            return $treeRepository;
        }
        catch (Exception $e) 
        {
            return [$e->getMessage()];
        }
    }
}
?>