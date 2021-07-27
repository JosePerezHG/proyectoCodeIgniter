<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PersonaModelo;
class Persona extends BaseController
{

	public function __construct() {
     	  helper(['form', 'url']);
       	    	            	
    }
	public function index()
	{
		return view('header').view('persona').view('footer');
	}
    public function index2()
  {
      $cadena="";
      $respuesta=array();         
     $modelo = new PersonaModelo($db);   
     $lista=$modelo->listar();
     foreach ($lista as $row) {
      $cadena.='<div class="col-md-4">';
        $cadena.='<div class="card">';
          if ($row['v11'] == null){
              $cadena.= '<img class="card-img-top" src="'.base_url().'/resources/img/nohay.jpg">';
              }
              else{
         $cadena.= '<img class="card-img-top" src="'.base_url().'/resources/profiles/'.$row['v11'].'">';
         }
         $cadena.= ' <ul class="list-group list-group-flush">';
         $cadena.=  ' <li class="list-group-item">Docum. Identidad: '.$row['v2'] .'</li>';
          $cadena.=  ' <li class="list-group-item">Apellidos: '.$row['v4'] .'</li>';
         $cadena.=  ' <li class="list-group-item">Nombres:'.$row['v3'] .'</li>';     
         $cadena.= '</div></div>';
     }
    return view('header').view('persona2',['lista' =>  $cadena]).view('footer');
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
              'foto' => [
                'uploaded[foto]',
                'mime_in[foto,image/jpg,image/jpeg,image/png]',
                'max_size[foto,1024]',
                'errors' => [
                'uploaded' => 'No se envio una imagen',
                'mime_in' => 'No se envio un formato aceptado(jpg,jpeg,png)',
                 'max_size' => 'La imagen no debe exceder de 1Mb'                
              ]
            ] 

        ]);

       if (!$input) {
       	 $respuesta['error'] = $this->validator->listErrors() ;
  
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
              $modelo = new PersonaModelo($db); 
               if($modelo->registrar($data)){
                 $respuesta['error']="";
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
