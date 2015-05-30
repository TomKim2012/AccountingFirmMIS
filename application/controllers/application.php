<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Application extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		if (! $this->session->userdata ( 'USERLOGGED' )) {
			$this->session->sess_destroy ();
			redirect ( 'auth' );
		}
		
		$this->load->library ( array (
				'table',
				'form_validation' 
		) );
		$this->load->model ( 'default_model', '', TRUE );
		$this->load->helper ( array (
				'form',
				'url',
				'file' 
		) );
		// $this->user_profile();
	}
	public function index() {
		$this->dashboard();
	}
	public function events() {
		$data ['active'] = 2;
		$data ['page_title'] = 'Seminars and Events';
		$data ['main_content'] = 'events_list';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function view_event() {
		$data ['active'] = 2;
		$data ['page_title'] = 'Event Details';
		$data ['main_content'] = 'event_details';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function bookevent($event_id) {
		$data ['event_id'] = $event_id;
		$data ['active'] = 2;
		$data ['page_title'] = 'Event Registration Centre';
		$data ['main_content'] = 'event_registration';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function event_registration() {
		$this->load->library ( 'form_validation' );
		$data ['active'] = 2;
		$data ['page_title'] = 'Event Registration Centre';
		
		$this->form_validation->set_rules ( 'company_name', 'Company Name', 'trim|required' );
		$this->form_validation->set_rules ( 'postal_address', 'Postal Address', 'trim|required' );
		$this->form_validation->set_rules ( 'post_code', 'post_code', 'trim|required' );
		$this->form_validation->set_rules ( 'country', 'Country', 'trim|required' );
		$this->form_validation->set_rules ( 'city', 'City', 'trim|required' );
		$this->form_validation->set_rules ( 'contact_person', 'Contact Person', 'trim|required' );
		$this->form_validation->set_rules ( 'telephone', 'Telephone Number', 'trim|required' );
		$this->form_validation->set_rules ( 'email_address', 'Email Address', 'trim|required' );
		$this->form_validation->set_rules ( 'payment_mode', 'Payment Mode', 'trim|required' );
		$this->form_validation->set_rules ( 'currency', 'Currency', 'trim|required' );
		
		$data ['event_id'] = $this->input->post ( 'event_id' );
		
		if ($this->form_validation->run () == FALSE) {
			
			$data ['main_content'] = 'event_registration';
			$this->load->view ( 'includes/app_template', $data );
		} else {
			
			$delagate_regno = $this->input->post ( 'delagate_regno' );
			$delegate_surname = $this->input->post ( 'delegate_surname' );
			$delegate_othernames = $this->input->post ( 'delegate_othernames' );
			$delegate_email = $this->input->post ( 'delegate_email' );
			$members = array ();
			foreach ( $delagate_regno as $a => $b ) {
				
				$members [] = array (
						'memberRegistrationNo' => $delagate_regno [$a],
						'surname' => $delegate_surname [$a],
						'otherNames' => $delegate_othernames [$a],
						'email' => $delegate_email [$a] 
				);
			}
			
			$post_data = array (
					
					'companyName' => $this->input->post ( 'company_name' ),
					'contact' => array (
							'physicalAddress' => $this->input->post ( 'postal_address' ),
							'postalCode' => $this->input->post ( 'post_code' ),
							'country' => $this->input->post ( 'country' ),
							'city' => $this->input->post ( 'city' ),
							'contactName' => $this->input->post ( 'contact_person' ),
							'telephoneNumbers' => $this->input->post ( 'telephone' ),
							'email' => $this->input->post ( 'email_address' ) 
					),
					
					'paymentMode' => $this->input->post ( 'payment_mode' ),
					'currency' => $this->input->post ( 'currency' ),
					'delegates' => $members 
			);
			
			$event_id = $this->input->post ( 'event_id' );
			
			$content = json_encode ( $post_data );
			// echo $content;
			$ch = curl_init ();
			$url = "http://demo.wira.io:9090/icpak/api/events/" . $event_id . "/bookings";
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $content );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 60 );
			
			$response = curl_exec ( $ch );
			
			$jsonresponce = json_decode ( $response );
			
			if (! curl_errno ( $ch )) {
				$info = curl_getinfo ( $ch );
				$http_status = $info ['http_code'];
				if ($info ['http_code'] == 0) {
					$desc = $response;
					$status = "Failed";
				} else {
					$desc = $response;
					$status = "Successful";
				}
			} else {
				$info = curl_getinfo ( $ch );
				$http_status = curl_errno ( $ch );
				$desc = curl_error ( $ch );
				$status = "Not Successful";
			}
			curl_close ( $ch );
			if ($http_status == 200 || $http_status == 201) {
				$url_path = parse_url ( $jsonresponce->uri, PHP_URL_PATH );
				$basename = pathinfo ( $url_path, PATHINFO_BASENAME );
				
				// $data['main_content']='booking_success';
				// $this->booking_success();
				redirect ( 'application/booking_success', 'refresh' );
			} else {
				$data ['msg'] = 'Not Successfully ' . $jsonresponce->message;
				$data ['main_content'] = 'event_registration';
				$this->load->view ( 'includes/app_template', $data );
			}
		}
	}
	public function mycpd($msg = NULL) {
		if ($msg == "1") {
			$data ['msg'] = "Your CPD has Successfully Been Submited";
		}
		
		$ch = curl_init ();
		$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/cpd";
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		curl_close ( $ch );
		
		if ($http_status == 200 || $http_status == 201) {
			
			$data ['mycpd'] = $jsonresponce->items;
		} else {
			$data ['mycpd'] = 'CPD not fetched';
		}
		
		$data ['active'] = 3;
		$data ['page_title'] = 'My CPD Details';
		$data ['main_content'] = 'my_cpd';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function addcpd() {
		$data ['active'] = 3;
		$data ['page_title'] = 'ADD CPD';
		$data ['main_content'] = 'add_cpd';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function sendcpd() {
		$data ['active'] = 3;
		$data ['page_title'] = 'Add CPD';
		
		$this->form_validation->set_rules ( 'event_id', 'Event', 'trim|required' );
		$this->form_validation->set_rules ( 'start_date', 'Start Date', 'trim|required' );
		$this->form_validation->set_rules ( 'end_date', 'End Date', 'trim|required' );
		$this->form_validation->set_rules ( 'cpd_hours', 'CPD hours', 'trim|required' );
		
		if ($this->form_validation->run () == FALSE) {
			$data ['main_content'] = 'add_cpd';
			$this->load->view ( 'includes/app_template', $data );
		} else {
			$memberId = $this->session->userdata ( 'userid' );
			$post_data = array (
					
					'eventId' => $this->input->post ( 'event_id' ),
					'startDate' => $this->input->post ( 'start_date' ),
					'endDate' => $this->input->post ( 'end_date' ),
					"status" => "PROCESSING",
					'cpdHours' => $this->input->post ( 'cpd_hours' ) 
			);
			
			$content = json_encode ( $post_data );
			// echo $content;
			$ch = curl_init ();
			$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/cpd";
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $content );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
			
			$response = curl_exec ( $ch );
			
			$jsonresponce = json_decode ( $response );
			
			if (! curl_errno ( $ch )) {
				$info = curl_getinfo ( $ch );
				$http_status = $info ['http_code'];
				if ($info ['http_code'] == 0) {
					$desc = $response;
					$status = "Failed";
				} else {
					$desc = $response;
					$status = "Successful";
				}
			} else {
				$info = curl_getinfo ( $ch );
				$http_status = curl_errno ( $ch );
				$desc = curl_error ( $ch );
				$status = "Not Successful";
			}
			
			curl_close ( $ch );
			
			if ($http_status == 200 || $http_status == 201) {
				$url_path = parse_url ( $jsonresponce->uri, PHP_URL_PATH );
				$basename = pathinfo ( $url_path, PATHINFO_BASENAME );
				// echo "User ID: ".$basename;
				$msg = '1';
				$this->mycpd ( $msg );
			} else {
				
				$data ['msg'] = 'Not Successfully ' . $desc . ' http status' . $http_status;
				$data ['main_content'] = 'add_cpd';
				$this->load->view ( 'includes/app_template', $data );
			}
		}
	}
	public function successful($msg) {
		$data ['active'] = 3;
		$data ['page_title'] = 'My CPD Details';
		$data ['main_content'] = 'my_cpd';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function booking_success() {
		$data ['active'] = 2;
		$data ['page_title'] = 'Event Registration Centre';
		$data ['main_content'] = 'booking_success';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function dashboard($msg = NULL) {
		$data ['active'] = 8;
		$data ['page_title'] = 'Dashboard';
		$data ['main_content'] = 'dashboard';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function profile() {
		$data ['profileactive'] = "1";
		$url = $this->session->userdata ( 'uri' );
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		// curl_setopt($ch,CURLOPT_HEADER, true);
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		                                                    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
		// curl_setopt($ch, CURLOPT_POST, count($postData));
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		// print_r( $response);
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		$data = array ();
		
		if ($http_status == 200 || $http_status == 201) {
			$this->_set_fields_reload ( $jsonresponce );
			curl_close ( $ch );
		} else {
			
			// $msg = '<font color=red>Invalid email address and/or password.</font><br />';
			// echo $jsonresponce->message;
			$msg = $jsonresponce->message;
			$data ['active'] = 1;
			$data ['page_title'] = 'User Profile';
			$data ['main_content'] = 'user_profile';
			$data ['tab_view'] = 'tabs/basic_tab';
			curl_close ( $ch );
		}
		$data ['active'] = 1;
		$data ['page_title'] = 'User Profile';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/basic_tab';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function user_profile() {
		$url = $this->session->userdata ( 'uri' );
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
		}
		curl_close ( $ch );
		
		if ($http_status == 200 || $http_status == 201) {
			
			$this->_set_fields_userprofile ( $jsonresponce );
		} else {
			$this->_set_fields_userprofile ( null );
		}
	}
	public function member_details($msg = NULL) {
		$data ['profileactive'] = "1";
		$data ['gender'] = $this->default_model->gender ();
		$data ['nationality'] = $this->default_model->nationality ();
		$data ['salutation'] = $this->default_model->salutation ();
		if ($msg == "1") {
			$data ['msg'] = "Successful Updates Information";
		} else {
			$data ['msg'] = "";
		}
		
		$url = $this->session->userdata ( 'uri' );
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		// curl_setopt($ch,CURLOPT_HEADER, true);
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		                                                    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
		// curl_setopt($ch, CURLOPT_POST, count($postData));
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		// print_r( $response);
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		if ($http_status == 200 || $http_status == 201) {
			
			$this->_set_fields_reload ( $jsonresponce );
			
			curl_close ( $ch );
		} else {
			
			$this->_set_fields_reload ( $jsonresponce );
			curl_close ( $ch );
		}
		$data ['page_title'] = 'Edit Personal Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/member_form';
		$this->load->view ( 'includes/app_template', $data );
	}
	function update_profile() {
		$this->_set_fields_reload ( null );
		$data ['profileactive'] = "1";
		$data ['gender'] = $this->default_model->gender ();
		$data ['nationality'] = $this->default_model->nationality ();
		$data ['salutation'] = $this->default_model->salutation ();
		
		$this->_set_rules_update ();
		
		// run validation
		if ($this->form_validation->run () == FALSE) {
			$data ['page_title'] = 'Edit Personal Information';
			$data ['main_content'] = 'user_profile';
			$data ['tab_view'] = 'tabs/member_form';
			$this->load->view ( 'includes/app_template', $data );
		} else {
			
			$post_data = array (
					"email" => $this->input->post ( 'email_address' ),
					"memberId" => $this->session->userdata ( 'userid' ),
					"phoneNumber" => $this->input->post ( 'phoneNumber' ),
					"residence" => $this->input->post ( 'residence' ),
					"city" => $this->input->post ( 'city' ),
					"nationality" => $this->input->post ( 'nationality' ),
					"userData" => array (
							"residence" => $this->input->post ( 'residence' ),
							"nationality" => $this->input->post ( 'nationality' ),
							"county" => $this->input->post ( 'country' ),
							"title" => $this->input->post ( 'salutation' ),
							"firstName" => $this->input->post ( 'first_name' ),
							"lastName" => $this->input->post ( 'last_name' ),
							"gender" => $this->input->post ( 'gender' ),
							"dob" => $this->input->post ( 'dob' ),
							"refId" => $this->session->userdata ( 'userid' ),
							"uri" => $this->session->userdata ( 'uri' ) 
					),
					
					"username" => $this->input->post ( 'email_address' ),
					"address" => $this->input->post ( 'address' ),
					"refId" => $this->session->userdata ( 'userid' ),
					"uri" => $this->session->userdata ( 'uri' ) 
			);
			
			$content = json_encode ( $post_data );
			
			// echo $content;
			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, $this->session->userdata ( 'uri' ) );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			// curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "PUT" );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $content );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
			
			$response = curl_exec ( $ch );
			
			$jsonresponce = json_decode ( $response );
			
			if (! curl_errno ( $ch )) {
				$info = curl_getinfo ( $ch );
				$http_status = $info ['http_code'];
				if ($info ['http_code'] == 0) {
					$desc = $response;
					$status = "Failed";
				} else {
					$desc = $response;
					$status = "Successful";
				}
			} else {
				$info = curl_getinfo ( $ch );
				$http_status = curl_errno ( $ch );
				$desc = curl_error ( $ch );
				$status = "Not Successful";
			}
			curl_close ( $ch );
			if ($http_status == 200 || $http_status == 201) {
				$url_path = parse_url ( $jsonresponce->uri, PHP_URL_PATH );
				$basename = pathinfo ( $url_path, PATHINFO_BASENAME );
				// echo "User ID: ".$basename;
				$msg = '1';
				// echo "Successfully Registered";
				$this->member_details ( $msg );
			} else {
				$data ['msg'] = 'Not Successfully ' . $http_status;
				$data ['page_title'] = 'Edit Personal Information';
				$data ['main_content'] = 'user_profile';
				$data ['tab_view'] = 'tabs/member_form';
				$this->load->view ( 'includes/app_template', $data );
			}
		}
	}
	function _set_fields_reload($jsonresponce) {
		$this->form_data = new stdClass ();
		$this->form_data->first_name = isset ( $jsonresponce->userData->firstName ) ? $jsonresponce->userData->firstName : "";
		$this->form_data->last_name = isset ( $jsonresponce->userData->lastName ) ? $jsonresponce->userData->lastName : "";
		$this->form_data->email_address = isset ( $jsonresponce->email ) ? $jsonresponce->email : "";
		$this->form_data->nationality = isset ( $jsonresponce->userData->nationality ) ? $jsonresponce->userData->nationality : "";
		$this->form_data->residence = isset ( $jsonresponce->userData->residence ) ? $jsonresponce->userData->residence : "";
		$this->form_data->gender = isset ( $jsonresponce->userData->gender ) ? $jsonresponce->userData->gender : "";
		$this->form_data->address = isset ( $jsonresponce->address ) ? $jsonresponce->address : "";
		$this->form_data->phoneNumber = isset ( $jsonresponce->phoneNumber ) ? $jsonresponce->phoneNumber : "";
		$this->form_data->dob = isset ( $jsonresponce->userData->dob ) ? $jsonresponce->userData->dob : "";
		$this->form_data->city = isset ( $jsonresponce->city ) ? $jsonresponce->city : "";
		$this->form_data->salutation = isset ( $jsonresponce->userData->title ) ? $jsonresponce->userData->title : "";
	}
	function _set_fields_userprofile($jsonresponce) {
		$this->form_data = new stdClass ();
		$this->form_data->first_name = isset ( $jsonresponce->userData->firstName ) ? $jsonresponce->userData->firstName : "";
		$this->form_data->last_name = isset ( $jsonresponce->userData->lastName ) ? $jsonresponce->userData->lastName : "";
	}
	function _set_rules_update() {
		$this->form_validation->set_rules ( 'first_name', 'First Name', 'trim|required' );
		$this->form_validation->set_rules ( 'last_name', 'Last Name', 'trim|required' );
		$this->form_validation->set_rules ( 'email_address', 'Email Address', 'trim|required|xss_clean' );
		
		// $this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message ( 'isset', '* required' );
		$this->form_validation->set_error_delimiters ( '<p class="error">', '</p>' );
	}
	public function education($msg = NULL) {
		$data ['profileactive'] = "2";
		if ($msg == "1") {
			$data ['msg'] = "Successfully added Education";
		} else if ($msg == "2") {
			$data ['msg'] = "Successfully Updated Education Information";
		} else {
		}
		$jsonresponce = array ();
		$ch = curl_init ();
		$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/education";
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		
		$jsonresponce = json_decode ( $response );
		
		// var_dump($jsonresponce);
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		curl_close ( $ch );
		
		if ($http_status == 200 || $http_status == 201) {
			
			$data ['myeducations'] = isset ( $jsonresponce->items ) ? $jsonresponce->items : null;
			// print_r($jsonresponce->items);
		}
		
		$data ['active'] = 1;
		$data ['page_title'] = 'Education Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/education_tab';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function offences($msg = NULL) {
		$data ['profileactive'] = "3";
		if ($msg == "1") {
			$data ['msg'] = "Successfully Added Offence Information";
		} else if ($msg == "2") {
			$data ['msg'] = "Successfully Updated Offence Information";
		} else {
		}
		$jsonresponce = array ();
		$ch = curl_init ();
		$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/offenses";
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		curl_close ( $ch );
		if ($http_status == 200 || $http_status == 201) {
			$data ['myoffences'] = isset ( $jsonresponce->items ) ? $jsonresponce->items : null;
		}
		
		$data ['active'] = 5;
		$data ['page_title'] = 'Offences Information';
		$data ['main_content'] = 'tabs/offences_tab';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function trainings($msg = NULL) {
		$data ['profileactive'] = "4";
		if ($msg == "1") {
			$data ['msg'] = "Successfully added Trainings";
		}
		$jsonresponce = array ();
		$ch = curl_init ();
		$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/training";
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		curl_close ( $ch );
		if ($http_status == 200 || $http_status == 201) {
			$data ['mytrainings'] = isset ( $jsonresponce->items ) ? $jsonresponce->items : null;
		}
		
		$data ['active'] = 1;
		$data ['page_title'] = 'Training Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/training_tab';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function enquiries() {
		$data ['active'] = 6;
		$data ['page_title'] = 'Enquiries';
		$data ['main_content'] = 'enquiries';
		$this->load->view ( 'includes/app_template', $data );
	}
	
	public function statements() {
		$data ['active'] = 4;
		$data ['page_title'] = 'Statements';
		$data ['main_content'] = 'statements';
		$this->load->view ( 'includes/app_template', $data );
	}
	
	public function specialization($msg = NULL) {
		$data ['profileactive'] = "5";
		if ($msg == "1") {
			$data ['msg'] = "Successfully added Specialization";
		}
		$jsonresponce = array ();
		$ch = curl_init ();
		$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/specialization";
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		curl_close ( $ch );
		if ($http_status == 200 || $http_status == 201) {
			$data ['myspecialization'] = isset ( $jsonresponce->items ) ? $jsonresponce->items : null;
		}
		
		$data ['active'] = 1;
		$data ['page_title'] = 'Specialization Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/specialization_tab';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function add_education($msg = NULL) {
		$data ['profileactive'] = "2";
		$data ['education_type'] = $this->default_model->education_type ();
		$this->_set_fields_education ( null );
		
		$data ['page_title'] = 'Add Education Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/education_form';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function add_offence($msg = NULL) {
		$data ['profileactive'] = "3";
		$this->_set_fields_offence ( null );
		
		$data ['page_title'] = 'Add Offence Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/offence_form';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function add_training($msg = NULL) {
		$data ['profileactive'] = "4";
		$data ['training_type'] = $this->default_model->training_type ();
		
		$this->_set_fields_training ( null );
		
		$data ['page_title'] = 'Add Training Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/training_form';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function add_specialization($msg = NULL) {
		$data ['profileactive'] = "5";
		$this->_set_fields_specialization ( null );
		
		$data ['page_title'] = 'Add Specialization Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/specialization_form';
		$this->load->view ( 'includes/app_template', $data );
	}
	function save_education() {
		$id = $this->input->post ( 'eduid' );
		$this->_set_fields_education ( null );
		
		$data ['profileactive'] = "2";
		$data ['education_type'] = $this->default_model->education_type ();
		
		$this->form_validation->set_rules ( 'institution', 'Institution Name', 'trim|required' );
		$this->form_validation->set_rules ( 'examiningBody', 'Examination Body', 'trim|required' );
		$this->form_validation->set_rules ( 'startDate', 'Start Date', 'trim|required|xss_clean' );
		$this->form_validation->set_rules ( 'dateCompleted', 'End Date', 'trim|required' );
		$this->form_validation->set_rules ( 'sectionsPassed', 'Section Passed', 'trim|required' );
		$this->form_validation->set_rules ( 'registrationNo', 'Registration Number', 'trim|required|xss_clean' );
		$this->form_validation->set_rules ( 'classOrDivision', 'Class or Division', 'trim|required' );
		$this->form_validation->set_rules ( 'award', 'Award', 'trim|required' );
		$this->form_validation->set_rules ( 'education_type', 'Education Type', 'trim|required' );
		
		if ($this->form_validation->run () == FALSE) {
			
			$data ['page_title'] = 'Add Education Information';
			$data ['main_content'] = 'user_profile';
			$data ['tab_view'] = 'tabs/education_form';
			$this->load->view ( 'includes/app_template', $data );
		} else {
			
			$post_data = array (
					"memberId" => $this->session->userdata ( 'userid' ),
					"dateCompleted" => $this->input->post ( 'dateCompleted' ),
					"sectionsPassed" => $this->input->post ( 'sectionsPassed' ),
					"registrationNo" => $this->input->post ( 'registrationNo' ),
					"startDate" => $this->input->post ( 'startDate' ),
					"institution" => $this->input->post ( 'institution' ),
					"examiningBody" => $this->input->post ( 'examiningBody' ),
					"classOrDivision" => $this->input->post ( 'classOrDivision' ),
					"award" => $this->input->post ( 'award' ),
					"type" => $this->input->post ( 'education_type' ),
					"uri" => $this->session->userdata ( 'uri' ) 
			);
			
			$content = json_encode ( $post_data );
			// echo $content;
			$ch = curl_init ();
			
			if ($id != NULL) {
				$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/education/" . $id;
			} else {
				$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/education";
			}
			
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			
			if ($id != NULL) {
				curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "PUT" );
			} else {
				curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
			}
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $content );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
			
			$response = curl_exec ( $ch );
			
			$jsonresponce = json_decode ( $response );
			// var_dump($jsonresponce);
			if (! curl_errno ( $ch )) {
				$info = curl_getinfo ( $ch );
				$http_status = $info ['http_code'];
				if ($info ['http_code'] == 0) {
					$desc = $response;
					$status = "Failed";
				} else {
					$desc = $response;
					$status = "Successful";
				}
			} else {
				$info = curl_getinfo ( $ch );
				$http_status = curl_errno ( $ch );
				$desc = curl_error ( $ch );
				$status = "Not Successful";
			}
			curl_close ( $ch );
			if ($http_status == 200 || $http_status == 201) {
				
				if (isset ( $id )) {
					$msg = '2';
				} else {
					$msg = '1';
				}
				redirect ( 'application/education/' . $msg, 'refresh' );
			} else {
				$data ['msg'] = 'Not Successfully ' . $jsonresponce->message;
				if (isset ( $id )) {
					$data ['page_title'] = 'Edit Education Information';
				} else {
					$data ['page_title'] = 'Add Education Information';
				}
				
				$data ['main_content'] = 'user_profile';
				$data ['tab_view'] = 'tabs/education_form';
				$this->load->view ( 'includes/app_template', $data );
			}
		}
	}
	function save_offence() {
		$data ['profileactive'] = "3";
		$id = $this->input->post ( 'offenceid' );
		$this->_set_fields_offence ( null );
		
		$this->form_validation->set_rules ( 'offense', 'Offence ', 'trim|required' );
		$this->form_validation->set_rules ( 'sentenceImposed', 'Sentence Imposed', 'trim|required' );
		$this->form_validation->set_rules ( 'dateConvicted', 'Date Convicted', 'trim|required|xss_clean' );
		$this->form_validation->set_rules ( 'placeConvicted', 'Place Convicted', 'trim|required' );
		
		if ($this->form_validation->run () == FALSE) {
			$data ['page_title'] = 'Add Offence Information';
			$data ['main_content'] = 'user_profile';
			$data ['tab_view'] = 'tabs/offence_form';
			$this->load->view ( 'includes/app_template', $data );
		} else {
			
			$post_data = array (
					"memberId" => $this->session->userdata ( 'userid' ),
					"offense" => $this->input->post ( 'offense' ),
					"sentenceImposed" => $this->input->post ( 'sentenceImposed' ),
					"dateConvicted" => $this->input->post ( 'dateConvicted' ),
					"placeConvicted" => $this->input->post ( 'placeConvicted' ),
					"uri" => $this->session->userdata ( 'uri' ) 
			);
			
			$content = json_encode ( $post_data );
			// echo $content;
			$ch = curl_init ();
			
			if ($id != NULL) {
				$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/offenses/" . $id;
			} else {
				$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/offenses";
			}
			
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			
			if ($id != NULL) {
				curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "PUT" );
				// echo "PUT";
			} else {
				curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
				// echo "POSt";
			}
			
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $content );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
			
			$response = curl_exec ( $ch );
			
			$jsonresponce = json_decode ( $response );
			// echo $jsonresponce;
			if (! curl_errno ( $ch )) {
				$info = curl_getinfo ( $ch );
				$http_status = $info ['http_code'];
				if ($info ['http_code'] == 0) {
					$desc = $response;
					$status = "Failed";
				} else {
					$desc = $response;
					$status = "Successful";
				}
			} else {
				$info = curl_getinfo ( $ch );
				$http_status = curl_errno ( $ch );
				$desc = curl_error ( $ch );
				$status = "Not Successful";
			}
			curl_close ( $ch );
			if ($http_status == 200 || $http_status == 201) {
				
				if (isset ( $id )) {
					$msg = '2';
				} else {
					$msg = '1';
				}
				redirect ( 'application/offences/' . $msg, 'refresh' );
			} else {
				$data ['msg'] = 'Not Successfully ' . $jsonresponce;
				if ($id != NULL) {
					$data ['page_title'] = 'Edit Offence Information';
				} else {
					$data ['page_title'] = 'Add Offence Information';
				}
				
				$data ['main_content'] = 'user_profile';
				$data ['tab_view'] = 'tabs/offence_form';
				$this->load->view ( 'includes/app_template', $data );
			}
		}
	}
	function save_specialization() {
		$data ['profileactive'] = "5";
		$this->_set_fields_specialization ( null );
		
		$this->form_validation->set_rules ( 'specialization', 'Specialization ', 'trim|required' );
		
		if ($this->form_validation->run () == FALSE) {
			$data ['page_title'] = 'Add Specialization Information';
			$data ['main_content'] = 'user_profile';
			$data ['tab_view'] = 'tabs/specialization_form';
			$this->load->view ( 'includes/app_template', $data );
		} else {
			
			$post_data = array (
					"memberId" => $this->session->userdata ( 'userid' ),
					"specialization" => $this->input->post ( 'specialization' ),
					"uri" => $this->session->userdata ( 'uri' ) 
			);
			
			$content = json_encode ( $post_data );
			
			$ch = curl_init ();
			$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/specialization";
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $content );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
			
			$response = curl_exec ( $ch );
			
			$jsonresponce = json_decode ( $response );
			
			if (! curl_errno ( $ch )) {
				$info = curl_getinfo ( $ch );
				$http_status = $info ['http_code'];
				if ($info ['http_code'] == 0) {
					$desc = $response;
					$status = "Failed";
				} else {
					$desc = $response;
					$status = "Successful";
				}
			} else {
				$info = curl_getinfo ( $ch );
				$http_status = curl_errno ( $ch );
				$desc = curl_error ( $ch );
				$status = "Not Successful";
			}
			curl_close ( $ch );
			if ($http_status == 200 || $http_status == 201) {
				
				$msg = '1';
				// $this->specialization($msg);
				redirect ( 'application/specialization/' . $msg );
			} else {
				$data ['msg'] = 'Not Successfully ' . $jsonresponce->message;
				$data ['page_title'] = 'Add Specialization Information';
				$data ['main_content'] = 'user_profile';
				$data ['tab_view'] = 'tabs/specialization_form';
				$this->load->view ( 'includes/app_template', $data );
			}
		}
	}
	function save_training() {
		$data ['profileactive'] = "4";
		$this->_set_fields_training ( null );
		$data ['training_type'] = $this->default_model->training_type ();
		
		$this->form_validation->set_rules ( 'organizationName', 'Organization Name', 'trim|required' );
		$this->form_validation->set_rules ( 'positionHeld', 'Position held', 'trim|required' );
		$this->form_validation->set_rules ( 'startDate', 'Start Date', 'trim|required|xss_clean' );
		$this->form_validation->set_rules ( 'endDate', 'End Date', 'trim|required' );
		$this->form_validation->set_rules ( 'natureOfTasksPerformed', 'Nature Of Tasks Performed', 'trim|required' );
		$this->form_validation->set_rules ( 'responsibilities', 'Responsibilities', 'trim|required|xss_clean' );
		$this->form_validation->set_rules ( 'clientsHandled', 'Clients Handled', 'trim|required' );
		$this->form_validation->set_rules ( 'datePassed', 'Date Passed', 'trim|required' );
		$this->form_validation->set_rules ( 'training_type', 'Training Type', 'trim|required' );
		
		if ($this->form_validation->run () == FALSE) {
			$data ['page_title'] = 'Add Training Information';
			$data ['main_content'] = 'user_profile';
			$data ['tab_view'] = 'tabs/training_form';
			$this->load->view ( 'includes/app_template', $data );
		} else {
			
			$post_data = array (
					"memberId" => $this->session->userdata ( 'userid' ),
					"endDate" => $this->input->post ( 'endDate' ),
					"startDate" => $this->input->post ( 'startDate' ),
					"organizationName" => $this->input->post ( 'organizationName' ),
					"positionHeld" => $this->input->post ( 'positionHeld' ),
					"natureOfTasksPerformed" => $this->input->post ( 'natureOfTasksPerformed' ),
					"responsibilities" => $this->input->post ( 'responsibilities' ),
					"clientsHandled" => $this->input->post ( 'clientsHandled' ),
					"datePassed" => $this->input->post ( 'datePassed' ),
					"type" => $this->input->post ( 'training_type' ),
					"uri" => $this->session->userdata ( 'uri' ) 
			);
			
			$content = json_encode ( $post_data );
			
			$ch = curl_init ();
			$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/training";
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $content );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
			
			$response = curl_exec ( $ch );
			
			$jsonresponce = json_decode ( $response );
			
			if (! curl_errno ( $ch )) {
				$info = curl_getinfo ( $ch );
				$http_status = $info ['http_code'];
				if ($info ['http_code'] == 0) {
					$desc = $response;
					$status = "Failed";
				} else {
					$desc = $response;
					$status = "Successful";
				}
			} else {
				$info = curl_getinfo ( $ch );
				$http_status = curl_errno ( $ch );
				$desc = curl_error ( $ch );
				$status = "Not Successful";
			}
			curl_close ( $ch );
			if ($http_status == 200 || $http_status == 201) {
				
				$msg = '1';
				// $this->trainings($msg);
				redirect ( 'application/trainings/' . $msg );
			} else {
				$data ['msg'] = 'Not Successfully ' . $jsonresponce->message;
				$data ['page_title'] = 'Add Training Information';
				$data ['main_content'] = 'user_profile';
				$data ['tab_view'] = 'tabs/training_form';
				$this->load->view ( 'includes/app_template', $data );
			}
		}
	}
	public function edit_education($eduid = NULL) {
		$data ['profileactive'] = "2";
		$data ['education_type'] = $this->default_model->education_type ();
		$data ['eduid'] = $eduid;
		
		$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/education/" . $eduid;
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		// curl_setopt($ch,CURLOPT_HEADER, true);
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		                                                    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
		// curl_setopt($ch, CURLOPT_POST, count($postData));
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		curl_close ( $ch );
		
		if ($http_status == 200 || $http_status == 201) {
			$this->_set_fields_education ( $jsonresponce );
		} else {
			$this->_set_fields_education ( $jsonresponce );
		}
		
		$data ['page_title'] = 'Edit Education Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/education_form';
		$this->load->view ( 'includes/app_template', $data );
	}
	public function edit_offence($offenceid = NULL) {
		$data ['profileactive'] = "2";
		$data ['education_type'] = $this->default_model->education_type ();
		$data ['offenceid'] = $offenceid;
		
		$url = "http://demo.wira.io:9090/icpak/api/members/" . $this->session->userdata ( 'userid' ) . "/offenses/" . $offenceid;
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		// curl_setopt($ch,CURLOPT_HEADER, true);
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				"Content-type: application/json" 
		) );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
		                                                    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
		// curl_setopt($ch, CURLOPT_POST, count($postData));
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		
		$response = curl_exec ( $ch );
		
		$jsonresponce = json_decode ( $response );
		
		if (! curl_errno ( $ch )) {
			$info = curl_getinfo ( $ch );
			$http_status = $info ['http_code'];
			if ($info ['http_code'] == 0) {
				$desc = $response;
				$status = "Failed";
			} else {
				$desc = $response;
				$status = "Successful";
			}
		} else {
			$info = curl_getinfo ( $ch );
			$http_status = curl_errno ( $ch );
			$desc = curl_error ( $ch );
			$status = "Not Successful";
		}
		
		curl_close ( $ch );
		
		if ($http_status == 200 || $http_status == 201) {
			$this->_set_fields_offence ( $jsonresponce );
		} else {
			$this->_set_fields_offence ( $jsonresponce );
		}
		
		$data ['page_title'] = 'Edit Education Information';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/offence_form';
		$this->load->view ( 'includes/app_template', $data );
	}
	function _set_fields_education($jsonresponce) {
		$this->form_data = new stdClass ();
		$this->form_data->dateCompleted = isset ( $jsonresponce->dateCompleted ) ? $jsonresponce->dateCompleted : "";
		$this->form_data->sectionsPassed = isset ( $jsonresponce->sectionsPassed ) ? $jsonresponce->sectionsPassed : "";
		$this->form_data->registrationNo = isset ( $jsonresponce->registrationNo ) ? $jsonresponce->registrationNo : "";
		$this->form_data->startDate = isset ( $jsonresponce->startDate ) ? $jsonresponce->startDate : "";
		$this->form_data->institution = isset ( $jsonresponce->institution ) ? $jsonresponce->institution : "";
		$this->form_data->examiningBody = isset ( $jsonresponce->examiningBody ) ? $jsonresponce->examiningBody : "";
		$this->form_data->classOrDivision = isset ( $jsonresponce->classOrDivision ) ? $jsonresponce->classOrDivision : "";
		$this->form_data->award = isset ( $jsonresponce->award ) ? $jsonresponce->award : "";
		$this->form_data->education_type = isset ( $jsonresponce->type ) ? $jsonresponce->type : "";
		$this->form_data->refId = isset ( $jsonresponce->refId ) ? $jsonresponce->refId : "";
	}
	function _set_fields_offence($jsonresponce) {
		$this->form_data = new stdClass ();
		$this->form_data->offense = isset ( $jsonresponce->offense ) ? $jsonresponce->offense : "";
		$this->form_data->dateConvicted = isset ( $jsonresponce->dateConvicted ) ? $jsonresponce->dateConvicted : "";
		$this->form_data->placeConvicted = isset ( $jsonresponce->placeConvicted ) ? $jsonresponce->placeConvicted : "";
		$this->form_data->sentenceImposed = isset ( $jsonresponce->sentenceImposed ) ? $jsonresponce->sentenceImposed : "";
		$this->form_data->refId = isset ( $jsonresponce->refId ) ? $jsonresponce->refId : "";
	}
	function _set_fields_training($jsonresponce) {
		$this->form_data = new stdClass ();
		$this->form_data->endDate = isset ( $jsonresponce->endDate ) ? $jsonresponce->endDate : "";
		$this->form_data->startDate = isset ( $jsonresponce->startDate ) ? $jsonresponce->startDate : "";
		$this->form_data->organizationName = isset ( $jsonresponce->organizationName ) ? $jsonresponce->organizationName : "";
		$this->form_data->positionHeld = isset ( $jsonresponce->positionHeld ) ? $jsonresponce->positionHeld : "";
		$this->form_data->natureOfTasksPerformed = isset ( $jsonresponce->natureOfTasksPerformed ) ? $jsonresponce->natureOfTasksPerformed : "";
		$this->form_data->responsibilities = isset ( $jsonresponce->responsibilities ) ? $jsonresponce->responsibilities : "";
		$this->form_data->clientsHandled = isset ( $jsonresponce->clientsHandled ) ? $jsonresponce->clientsHandled : "";
		$this->form_data->datePassed = isset ( $jsonresponce->datePassed ) ? $jsonresponce->datePassed : "";
		$this->form_data->training_type = isset ( $jsonresponce->type ) ? $jsonresponce->type : "";
		$this->form_data->refId = isset ( $jsonresponce->refId ) ? $jsonresponce->refId : "";
	}
	function _set_fields_specialization($jsonresponce) {
		$this->form_data = new stdClass ();
		$this->form_data->specialization = isset ( $jsonresponce->specialization ) ? $jsonresponce->specialization : "";
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */