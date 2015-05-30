<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Auth extends CI_Controller {
	// This is the First function to run on loading the admin portal
	function __construct() {
		parent::__construct ();
		
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
	}
	public function index($msg = NULL) {
		if ($msg == "1") {
			$data ['msg'] = "Successful Registered , Login Below using your Email Address and password";
		} else {
			$data ['msg'] = "";
		}
		$data ['main_content'] = 'login_page';
		$this->load->view ( 'includes/template', $data );
	}
	
	// This Function helps u add a new User
	public function signup($msg = NULL) {
		$this->_set_fields ();
		$data ['main_content'] = 'signup';
		$this->load->view ( 'includes/template', $data );
	}
	public function forgot($msg = NULL) 

	{
		$data ['msg'] = $msg;
		$this->load->view ( 'forgot', $data );
	}
	function validate_user() {
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_rules ( 'username', 'Username', 'trim|required' );
		$this->form_validation->set_rules ( 'password', 'Password', 'trim|required' );
		if ($this->form_validation->run () == FALSE) {
			$this->index ();
		} else {
			$username = $this->input->post ( 'username' );
			$password = $this->input->post ( 'password' );
			$url = "http://demo.wira.io:9090/icpak/api/users/auth?username=" . $username . "&password=" . $password;
			
			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			// curl_setopt($ch,CURLOPT_HEADER, true);
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
					"Content-type: application/json" 
			) );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // curl error SSL certificate problem, verify that the CA cert is OK
			                                                    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 400 );
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
				$url_path = parse_url ( $jsonresponce->uri, PHP_URL_PATH );
				$basename = pathinfo ( $url_path, PATHINFO_BASENAME );
				$data = array (
						'uri' => $jsonresponce->uri,
						'userid' => $jsonresponce->refId,
						'first_name' => $jsonresponce->userData->firstName,
						'last_name' => $jsonresponce->userData->lastName,
						'USERLOGGED' => true 
				);
				$this->session->set_userdata ( $data );
				
				redirect ( 'application/profile', 'refresh' );
				curl_close ( $ch );
			} else {
				
			    $msg = 'Invalid email address and/or password.<br />';
				// echo $jsonresponce->message;
				//$msg = $jsonresponce->message;
				$data ['msg'] = $msg . '(' .$jsonresponce->status . ')' ;
				$data ['main_content'] = 'login_page';
				$this->load->view ( 'includes/template', $data );
				//
				
				curl_close ( $ch );
			}
		}
	}
	function logout() {
		$data = array ();
		$this->session->set_userdata ( $data );
		$this->session->sess_destroy ();
		$msg = '<font color=blue>You Are Logged Out<br />';
		redirect ( 'auth' );
	}
	function do_register() {
		$this->_set_fields ();
		// set validation properties
		$this->_set_rules ();
		
		// run validation
		if ($this->form_validation->run () == FALSE) {
			$data ['main_content'] = 'signup';
			$this->load->view ( 'includes/template', $data );
		} else {
			
			$post_data = array (
					'email' => $this->input->post ( 'email_address' ),
					'username' => $this->input->post ( 'email_address' ),
					'password' => $this->input->post ( 'password' ),
					'userData' => array (
							'title' => '',
							'isOverseas' => '',
							'firstName' => $this->input->post ( 'first_name' ),
							'lastName' => $this->input->post ( 'last_name' ),
							'gender' => 'MALE',
							'ageGroup' => ' ',
							'dob' => '',
							'nationality' => '',
							'residence' => '',
							'county' => '' 
					) 
			);
			
			$content = json_encode ( $post_data );
			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, "http://demo.wira.io:9090/icpak/api/users" );
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
				// echo "Successfully Registered";
				$this->index ( $msg );
			} else if ($http_status == 500) {
				$data ['msg'] = 'Not Successfully ' . $desc;
				// $data['msg']= 'Not Successfully ' .isset($jsonresponce->message) ? $jsonresponce->message : "";
				$data ['main_content'] = 'signup';
				$this->load->view ( 'includes/template', $data );
			} else {
				// $data['msg']= 'Not Successfully ' .$desc;
				$data ['msg'] = 'Not Successfully ' . $jsonresponce->message;
				$data ['main_content'] = 'signup';
				$this->load->view ( 'includes/template', $data );
			}
		}
	}
	function _set_fields() {
		$this->form_data = new stdClass ();
		$this->form_data->first_name = '';
		$this->form_data->last_name = '';
		$this->form_data->password = '';
		$this->form_data->cpassword = '';
		$this->form_data->email_address = '';
	}
	
	// valdoc_idation rules
	function _set_rules() {
		$this->form_validation->set_rules ( 'first_name', 'First Name', 'trim|required' );
		$this->form_validation->set_rules ( 'last_name', 'Last Name', 'trim|required' );
		$this->form_validation->set_rules ( 'password', 'Password', 'trim|required|matches[cpassword]' );
		$this->form_validation->set_rules ( 'cpassword', 'Confrim Password', 'trim|required' );
		$this->form_validation->set_rules ( 'email_address', 'Email Address', 'trim|required|xss_clean' );
		
		// $this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message ( 'isset', '* required' );
		$this->form_validation->set_error_delimiters ( '<p class="error">', '</p>' );
	}
	function change_password() {
		$data ['active'] = 1;
		$data ['page_title'] = 'Change Password';
		$data ['main_content'] = 'user_profile';
		$data ['tab_view'] = 'tabs/change_password';
		$this->load->view ( 'includes/template', $data );
	}
}










