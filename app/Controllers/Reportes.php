<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ReporteModelo;
class Reportes extends BaseController
{
   
	public function __construct() {
     helper(['form', 'url','funciones']);
   
    }
	public function index()
	{
	
	  return view('header').view('reportes').view('footer');


	}
	public function rep1(){
	$respuesta=array();
	$respuesta['titulorep']="Reporte Personas y Foto";
	$respuesta['datacab']="<tr><th>Tipo</th><th>Valor</th></tr>";  	
	 $modelo = new ReporteModelo($db);       	

	$var=$modelo->listarReportes1();
	$rep=array();
	foreach($var as  $obj){
		array_push($rep, array('label'=>$obj['v1'], 'y'=>$obj['v2']+10));	  
	}	
	$respuesta['data']=$var;
	$respuesta['datagrafico']=$rep;
 	header('Content-Type: application/x-json; charset=utf-8');
	echo (json_encode($respuesta));
	}
}