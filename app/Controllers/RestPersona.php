<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestPersona extends ResourceController
{
    protected $modelName = 'App\Models\PersonaModelo';
    protected $format    = 'json';

    public function index()
    {
       // return $this->respond($this->model->listar());
    	return $this->genericResponse($this->model->listar(),"listado",200);
    }
	public function create()
    {
    	$validation =  \Config\Services::validation();		   
       if (!$this->validate('datapersona')) {
       	 
  return $this->genericResponse(null,$validation->getErrors() ,500);
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
                $img = $this->request->getFile('foto'); 
               $fot = $img->getRandomName();
                $img->move(ROOTPATH.'resources/profiles',$fot);
              $data = array($dni,$nombre,$apel,$tel,$corr,$dir,$fec,$est,
                $fot);              
               if($this->model->registrar($data)){
               	return $this->genericResponse(null,"Operacion realizada",200);                 
              }else{
                  return $this->genericResponse(null,"Problemas al realizar operacion!!",500);                  
              }
                 
             } 


        
    }
    public function genericResponse($data,$mensaje,$code)
    {
        	if($code==200){
        		return  $this->respond(array(
   						'data' => $data, 'msg' => $mensaje, 'code' => $code
   		 ));
        	}
        	else{
        			return  $this->respond(array(
   			'msg' => $mensaje, 	'code' => $code
   		 ));
        	}
    }
    
    // ...
}