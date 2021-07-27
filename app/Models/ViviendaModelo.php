<?php namespace App\Models;

use CodeIgniter\Model;

class ViviendaModelo extends Model
{

  public function listar()
    {
    	$db = \Config\Database::connect();
    	$sql = "CALL sp_listar_vivienda()";
		$result=$db->query($sql);
    	$db->close();
    	return $result->getResultArray();   


    }
     public function registrar($data)
    {
    	$db = \Config\Database::connect();
    	$sql = "CALL sp_registrar_vivienda(?,?,?,?,?,?,?,@s)";
    	$db->query($sql,$data);
    	$res =$db->query('select @s as out_param');
    	$db->close();
    	return   $res->getRow()->out_param;    
    }
    public function comboestado()
    {
        $db = \Config\Database::connect();
        $sql = "CALL  sp_listar_estado()";
        $result=$db->query($sql);
        $db->close();
        return $result->getResultArray();   

    }
}