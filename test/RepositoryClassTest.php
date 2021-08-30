<?php 

use PHPUnit\Framework\TestCase;

class RepositoryClassTest extends TestCase
{
    public function test_getType()
    {
        require("class/RepositoryClass.php");

        $repository = new Repository(array(
            'repositorio_id'            => 0,
            'nombre'                    => 'Test',
            'nombre_repositorio'        => 'luciorosella/test',
            'dependencia_id'            => null,
            'tipo_repositorio_id'       => 1,
            'tipo_repositorio_nombre'   => 'Libreria',
            'tipo_origen_id'            => 1,
            'tipo_origen_nombre'        => 'Propio',
        ));

        $this->assertEquals(gettype($repository), 'object');
    }
}
?>