<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ViviendaModelo;
class Vivienda extends BaseController
{

	public function __construct() {
     	  helper(['form', 'url','funciones']);
       	    	            	
    }
	public function index()
	{
      $modelo = new ViviendaModelo($db);
     $data['comboestado']=generarcombo($modelo->comboestado());
		return view('header').view('vivienda',$data).view('footer');
	}
  public function index2()
  {
       $cadena="";
      $respuesta=array();         
     $modelo = new ViviendaModelo($db);   
     $lista=$modelo->listar();
     foreach ($lista as $row) {
      $cadena.='<div class="col-md-4">';
        $cadena.='<div class="card">';
          if ($row['v9'] == null){
              $cadena.= '<img class="card-img-top" src="'.base_url().'/resources/img/nohay.jpg">';
              }
              else{
         $cadena.= '<img class="card-img-top" src="'.base_url().'/resources/upload/'.$row['v9'].'">';
         }

         $cadena.=  '<h5 class="card-title">'.$row['v2'] .'</h5>';
         $cadena.= '<div class="card-body">';          
          $cadena.= '<p class="card-text">'.$row['v3'] .'</p>';
         $cadena.= '<a href="'.$row['v14'].'" class="btn btn-primary">Go somewhere</a>';
         $cadena.= '</div></div></div>';
     }
    return view('header').view('vivienda2',['lista' =>  $cadena]).view('footer');
  }

public function doList(){
    $cadena="";
      $respuesta=array();         
     $modelo = new ViviendaModelo($db);   
     $lista=$modelo->listar();
     foreach ($lista as $row) {
      $cadena.='<div class="col-md-4">';
        $cadena.='<div class="card">';
          if ($row['v9'] == null){
              $cadena.= '<img class="card-img-top" src="'.base_url().'/resources/img/nohay.jpg">';
              }
              else{
         $cadena.= '<img class="card-img-top" src="'.base_url().'/resources/upload/'.$row['v9'].'">';
         }

         $cadena.=  '<h5 class="card-title">'.$row['v2'] .'</h5>';
         $cadena.= '<div class="card-body">';          
          $cadena.= '<p class="card-text">'.$row['v3'] .'</p>';
         $cadena.= '<a href="#" class="btn btn-primary">Go somewhere</a>';
         $cadena.= '</div></div></div>';
     }
      $respuesta['data']= $cadena;
     header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));
}

public function doSave()
	{
		$validation =  \Config\Services::validation();
		$respuesta = array();
          
    
      $input = $this->validate([
            'direccion' => [
            'rules'  => 'required|min_length[5]|max_length[45]',
            'errors' => [
                'required' => 'No debe la Direccion ser vacio',
                'min_length' => 'La direccion debe ser mayor de 5 letras',
                'max_length' => 'La direccion no debe exceder de 45 caracteres'
              ]
            ],
            'referencia' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'No debe el Referencia ser vacio'
                
              ]
            ],
            
            'zona' => 'required',
            'coorx' => 'required|decimal',
            'coory' => 'required|decimal',            
            'estadov' => 'required|numeric',
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
                $dir= $request->getPostGet('direccion') ;
              $ref= $request->getPostGet('referencia') ;
              $zon= $request->getPostGet('zona') ;
              $cx= $request->getPostGet('coorx') ;
              $cy= $request->getPostGet('coory') ;
              $est= $request->getPostGet('estadov') ;
               $img = $this->request->getFile('foto'); 
               $fot = $img->getRandomName();
                $img->move(ROOTPATH.'resources/upload',$fot);
              $data = array($dir,$ref,$est,$zon,$cx,$cy,$fot); 
              $modelo = new ViviendaModelo($db); 
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
