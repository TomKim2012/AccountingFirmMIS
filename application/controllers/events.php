<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
 		
		$this->load->library(array('table','form_validation'));
		$this->load->model('default_model','',TRUE);
		$this->load->helper(array('form', 'url', 'file'));	
		//$this->user_profile();
 		
		
        }
		
	
	public function index()
	{
		 $data['main_content']='dashboard';
		$this->load->view('includes/template',$data);

	}
	public function events()
	{
		$data['active'] = 2;
		$data['page_title']='Available Events';
		$data['main_content']='events_list';
		$this->load->view('includes/template',$data);

	}
	public function view_event()
	{
		$data['active'] = 2;
		$data['page_title']='Event Details';
		$data['main_content']='event_details';
		$this->load->view('includes/template',$data);

	}
	public function bookevent($event_id)
	{
		$data['event_id'] = $event_id;
		$data['active'] = 2;
		$data['page_title']='Event Registration Centre';
		$data['main_content']='event_registration';
		$this->load->view('includes/template-user',$data);

	}
	public function event_registration()
	{
		$this->load->library('form_validation'); 
		$data['active'] = 2;
		$data['page_title']='Event Registration Centre';

		
		$this->form_validation->set_rules('company_name','Company Name','trim|required');
		$this->form_validation->set_rules('postal_address','Postal Address','trim|required');
		$this->form_validation->set_rules('post_code','post_code','trim|required');
		$this->form_validation->set_rules('country','Country','trim|required');
		$this->form_validation->set_rules('city','City','trim|required');
		$this->form_validation->set_rules('contact_person','Contact Person','trim|required');
		$this->form_validation->set_rules('telephone','Telephone Number','trim|required');
		$this->form_validation->set_rules('email_address','Email Address','trim|required');
		$this->form_validation->set_rules('payment_mode','Payment Mode','trim|required');
		$this->form_validation->set_rules('currency','Currency','trim|required');

		$data['event_id'] = $this->input->post('event_id');
		
		if($this->form_validation->run()==FALSE)
		{
			
			$data['main_content']='event_registration';
			$this->load->view('includes/template',$data);
		}
		else
		{

		$delagate_regno = $this->input->post('delagate_regno');
		$delegate_surname = $this->input->post('delegate_surname');
		$delegate_othernames = $this->input->post('delegate_othernames');
		$delegate_email = $this->input->post('delegate_email');
		$members = array();
		foreach($delagate_regno as $a => $b){
			
			$members[] = array('memberRegistrationNo' => $delagate_regno[$a], 'surname' => $delegate_surname[$a], 'otherNames' => $delegate_othernames[$a], 'email' => $delegate_email[$a]);

		}

			$post_data = array(

				'companyName'  => $this->input->post('company_name'),
				'contact' => array(
					'physicalAddress'  => $this->input->post('postal_address'),
					'postalCode'  => $this->input->post('post_code'),
					'country'  => $this->input->post('country'),
					'city'  => $this->input->post('city'),
					'contactName'  => $this->input->post('contact_person'),
					'telephoneNumbers'  => $this->input->post('telephone'),
					'email'  => $this->input->post('email_address'),
				  ),
				
				'paymentMode'  => $this->input->post('payment_mode'),
				'currency'  => $this->input->post('currency'),
			  	'delegates' => $members
			);

			$event_id = $this->input->post('event_id');
			
			$content = json_encode($post_data);
			//echo $content;
			$ch = curl_init();  	
			$url= "http://demo.wira.io:9090/icpak/api/events/".$event_id."/bookings";
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60 );

			$response=curl_exec($ch);

			$jsonresponce   = json_decode($response);
			
			if(!curl_errno($ch))
			{	
				$info = curl_getinfo($ch);
				$http_status = $info['http_code'];
				if($info['http_code'] == 0){
					$desc = $response;
					$status = "Failed";
				}else{
				$desc = $response;
				$status = "Successful";
				}
				
			}
			else
			{	
				$info = curl_getinfo($ch);
				$http_status = curl_errno($ch);
				$desc = curl_error($ch);
				$status = "Not Successful";  
			}
			curl_close($ch);
			if($http_status == 200 || $http_status == 201){
			$url_path = parse_url($jsonresponce->uri, PHP_URL_PATH);
			$basename = pathinfo($url_path, PATHINFO_BASENAME);

			//$data['main_content']='booking_success';
			//$this->booking_success();
			redirect('application/booking_success','refresh');
			}else{
			$data['msg']= 'Not Successfully ' .$jsonresponce->message;
			$data['main_content']='event_registration';
			$this->load->view('includes/template',$data);
			
			}
		}
	}
	
	
	public function booking_success()
	{
		$data['active'] = 2;
		$data['page_title']='Event Registration Centre';
		$data['main_content']='booking_success';
		$this->load->view('includes/template',$data);

	}
	
	


}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */