<?php namespace App\Controllers;
use CodeIgniter\Controller;
class Blog extends BaseController
{

	public function __construct() {
     	  helper(['form', 'url']);
       	    	            	
    }
	public function index()
	{
		return view('header').view('blog').view('footer');
	}
}
