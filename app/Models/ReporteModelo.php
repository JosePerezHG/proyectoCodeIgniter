<?php namespace App\Models;

use CodeIgniter\Model;

class ReporteModelo extends Model
{
   
    public function listarReportes1()
    {
       $db = \Config\Database::connect();
        $qry = "CALL sp_reporte1()";
       $result =$db->query($qry);    
       $db->close();    
       return $result->getResultArray();   
     }
     
}