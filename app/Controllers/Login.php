<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModelo;
class Login extends BaseController
{

	public function __construct() {
     	  helper(['form', 'url']);
       	    	            	
    }
	public function index()
	{
		return view('header').view('login').view('footer');
	}
  
public function doList(){
    
    $respuesta=array();         
     $modelo = new PersonaModelo($db);   
     $respuesta['data']=$modelo->listar();
     header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));
}

public function doLogin()
	{
		$validation =  \Config\Services::validation();
		$respuesta = array();
          
    
      $input = $this->validate([
            'user' => [
            'rules'  => 'required|min_length[5]|valid_email',
            'errors' => [
                'required' => 'No debe el Usuario ser vacio',
                'min_length' => 'El Usuario debe ser mayor de  5 carateres'
              ]
            ],

            'pass' => [
            'rules'  => 'required|min_length[5]|max_length[20]',
            'errors' => [
                'required' => 'No debe Clave ser vacio',
                'min_length' => 'Clave debe ser mayor de 5 letras',
                'max_length' => 'Clave no debe exceder de 50 caracteres'
              ]
            ]           
            
        ]);

       if (!$input) {
       //	 $respuesta['error'] = $this->validator->listErrors() ;
          echo view('header').view('login', [
                'validation' => $this->validator
            ]).view('footer');
  
        } else {
                $request =  \Config\Services::request();
                $user= $request->getPostGet('user') ;
              $pass= $request->getPostGet('pass') ;
              $data = array($user,password_hash($pass, PASSWORD_DEFAULT));
                $modelo = new LoginModelo($db); 
               $resultado=$modelo->login($data);
               if(isset($resultado) && password_verify($pass,$resultado->v3)){
                      $newdata=[
                      'iduser'  => $resultado->v1,
                      'usuario' => $resultado->v2,
                      'idtipo' => $resultado->v4,
                      'desuser' => $resultado->v5
                    ];
                     $this->session->set($newdata);
                     $p=array($resultado->v1);
                     $paginas=$modelo->paginas($p);
                     $newpag=[
                        'paginas' => $paginas
                     ]; 
                      $this->session->set($newpag);                   
                      $jus= base_url().'/portada/index';
                      header('Location: '.$jus);
                      exit();  
                    }else{
                       echo view('header').view('login', [
                'validation' => 'Acceso incorrecto'
            ]).view('footer');

                 }
        }        



	}
  public function cerrarsesion(){
     $this->session->destroy();
        $jus= base_url().'/portada/index';
                      header('Location: '.$jus);
                      exit(); 
  }
	//--------------------------------------------------------------------
public function  prueba(){
  $respuesta = array();
      $respuesta['data'] = password_hash('12345678', PASSWORD_BCRYPT);    

       if (password_verify('12345678','$2y$10$1uMxVboNrzjI4wtU8Ykqxeu8p5i9gsms6wmQ.12mFGub5g6FUpJLW')){
          $respuesta['ok']="ok";
          }

    header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta)); 
}

  public function leerdatos()
  {
   
    if( $this->session->has('usuario')){
        echo  $this->session->get('iduser').'<br/>';
        echo  $this->session->get('desuser').'<br/>';
        var_dump($this->session->get('paginas'));
    }else{
       echo 'No hay datos';
    }
  }
public function leerpaginas()
  {
   
    $p=array("5");
    $modelo = new LoginModelo($db);  
   $paginas=$modelo->paginas($p);
    header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($paginas)); 
  }

}
