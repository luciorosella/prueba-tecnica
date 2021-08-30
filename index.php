<?php
    require_once("class/TreeClass.php");
    require_once("class/DirectoryClass.php");

    try
    {
        if(empty($_GET['menu']))
            throw new Exception("No se ha ingresado un menu");

        switch ($_GET['menu']):
            case 1:
                $tree = new Tree();
                $data = $tree->index();

                echo json_encode($data);

                break;
            case 2:
                /* Busqueda por nombre del composer.json */
                $name = $_GET['name_composer'];
                
                $directory = new Directories();
                $data = $directory->getDirectoryByName($name);

                echo json_encode($data);

                break;
            default:
                throw new Exception("No se ha ingresado un menu válido");
                break;
        endswitch;
    }
    catch (Exception $e) 
    {
        echo $e->getMessage();
    }

?>