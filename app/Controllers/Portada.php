<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PersonaModelo;
class Portada extends BaseController
{

	public function __construct() {
     	  helper(['form', 'url']);
       	    	            	
    }
	public function index()
	{
		return view('header').view('portada2').view('footer');
	}
public function doList(){
    $respuesta=array();         
     $modelo = new PersonaModelo($db);   
     $respuesta['data']=$modelo->listar();
     header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));
}

public function doSave()
	{
		$validation =  \Config\Services::validation();
		$respuesta = array();
          
    
      $input = $this->validate([
            'dni' => [
            'rules'  => 'required|exact_length[8]',
            'errors' => [
                'required' => 'No debe el DNI ser vacio',
                'exact_length' => 'El DNI debe ser de 8 digitos'
              ]
            ],

            'nombre' => [
            'rules'  => 'required|min_length[5]|max_length[50]',
            'errors' => [
                'required' => 'No debe el Nombre ser vacio',
                'min_length' => 'El Nombre debe ser mayor de 5 letras',
                'max_length' => 'El Nombre no debe exceder de 50 caracteres'
              ]
            ],
            
            'apellidos' => 'required|min_length[5]|max_length[90]',
            'dir' => 'required|min_length[5]|max_length[50]',
            'tel' => 'required|min_length[5]|max_length[12]',
            'correo' => 'required|min_length[5]|max_length[30]|valid_email',
            'fecha' => 'required',
            'estado' => 'required|numeric',
        ]);

       if (!$input) {
       //	 $respuesta['error'] = $this->validator->listErrors() ;
       echo view('header').view('portada2', [
                'validation' => $this->validator
            ]).view('footer');
            
        } else {
                $request =  \Config\Services::request();
                $dni= $request->getPostGet('dni') ;
              $nombre= $request->getPostGet('nombre') ;
              $apel= $request->getPostGet('apellidos') ;
              $tel= $request->getPostGet('tel') ;
              $corr= $request->getPostGet('correo') ;
              $dir= $request->getPostGet('dir') ;
              $fec= $request->getPostGet('fecha') ;
              $est= $request->getPostGet('estado') ;  
              $data = array($dni,$nombre,$apel,$tel,$corr,$dir,$fec,$est); 
              $modelo = new PersonaModelo($db); 
               if($modelo->registrar($data)){
                  $respuesta['ok'] = "Operacion realizada";
              }else{
                  $respuesta['error'] = "Problemas al realizar operacion!!";
              }
                 

            
        }


        

		header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));
		

	}
	//--------------------------------------------------------------------

}
