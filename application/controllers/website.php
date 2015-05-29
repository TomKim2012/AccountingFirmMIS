<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* -- Solutech Limited --
      Orders Controller for Orders Management Module
*/

class Website extends CI_Controller {

		public function __construct()
			{
				parent::__construct();

				$this->load->database();
				$this->load->helper('url');
		        
				$this->load->model('website_model');

			}
		// --
 
	public function index()
	{
	    //Schools List
		$data['breadcrumbs']="High Schools In Kenya";
		$data['title']="High Schools In Kenya";
		$data['firms_list']=$this->website_model->list_firms();
		$this->load->view('audit_firms',$data);
		
       }
	public function resources()
		{
		    //Schools List
			$data['breadcrumbs']="High Schools In Kenya";
			$data['title']="High Schools In Kenya";
			$data['firms_list']=$this->website_model->list_firms();
			$this->load->view('audit_firms',$data);
		
	       }
    
    }
