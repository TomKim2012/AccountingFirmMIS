<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	// num of records per page
	private $limit = 15;
	
	function __construct()
	{
		parent::__construct();
		
		// load helper
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('ajax_grocery_CRUD');
	}
	
	public function _settings_output($output = null)
	{
		$this->load->view('includes/header.php');
		$this->load->view('settings',$output);
		$this->load->view('includes/footer.php');
	}
	public function index()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('users');
			$crud->columns('full_names','user_category','gender','phone_number','email_address');
			$crud->display_as('full_names','Full Name')
				 ->display_as('gender','Gender')
				 ->display_as('phone_number','Phone Number')
				 ->display_as('user_category','User Category')
				 ->display_as('email_address','Email Address');
				 
				 
		     
				 
		        $this->db->select('min_id, ministry_name');
		        $this->db-> from('ministries');
		        $query = $this ->db-> get();
			$finalArray = array();
			foreach ($query->result() as $row)
			{
				$finalArray[$row->min_id]=$row->ministry_name;
			}

			$crud->field_type('ministry_id','dropdown', $finalArray);

                        //$crud->add_fields('full_names','user_category','ministry_id','gender','phone_number','email_address','password');

			$crud->set_subject('System Users');
			$crud->fields('full_names','user_category','ministry_id','gender','phone_number','email_address','password');
			$crud->required_fields('full_names','user_category','gender','phone_number','email_address','password');
			$crud->set_relation('user_category','user_categories','user_category');
			
                        $crud->callback_before_insert(array(
		                $this,
		                'encrypt_password_callback'
		            ));
		            
		        $crud->callback_after_insert(
		                function ($post_array,$primary_key)
		                {
		                	$user_cat=$post_array['user_category'];
		                	$u_min=$post_array['ministry_id'];
		                	if($user_cat==2){
		                      $query="INSERT INTO ministry_users(user_id,ministry_id) VALUES($primary_key,$u_min)";
		                      }
		
		                    $this->db->query($query);
		                    return true;
		                }
		            );
			$output = $crud->render();

			$this->_settings_output($output);
	}

	public function ministries()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('ministries');
			$crud->columns('ministry_name');
			

			$crud->set_subject('Ministries');
			

			$output = $crud->render();

			$this->_settings_output($output);
	}
	public function directorates()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('directorates');
			$crud->columns('ministry_id','directorate');
			$crud->display_as('ministry_id','Ministry Name')
				 ->display_as('directorate','Directorate Name');
				

			$crud->set_subject('Directorates');
			$crud->set_relation('ministry_id','ministries','ministry_name');

			$output = $crud->render();

			$this->_settings_output($output);
	}
	public function formulas()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('formulas');
			$crud->columns('formula_name','formula_description');
			$crud->display_as('formula_name','Formuls Name')
				 ->display_as('formula_description','Formula Description');
				

			$crud->set_subject('Formulas');
			

			$output = $crud->render();

			$this->_settings_output($output);
	}
	public function indicator_cat()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('indicator_categories');
			$crud->columns('indicator_category');
			$crud->display_as('indicator_category','Indicator Category Name');
				 

			$crud->set_subject('Indicator Categories');
			

			$output = $crud->render();

			$this->_settings_output($output);
	}
	public function pillars()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('pillars');
			$crud->columns('pillar','pillar_image');
			$crud->display_as('pillar','Pillar Name')
			 ->display_as('pillar_image','Pillar Image');
				 

			$crud->set_subject('Government Pillars');
			$crud->required_fields('pillar');
            $crud->fields('pillar', 'pillar_image');
			$crud->set_field_upload('pillar_image','uploads/images');

			$output = $crud->render();

			$this->_settings_output($output);
	}
	public function projects()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('projects');
			$crud->columns('pillar_id','project_title','project_image');
			$crud->display_as('pillar_id','Pillar Name')
			 ->display_as('project_title','Project Title')
			 ->display_as('project_image','Project Image');
				 

			$crud->set_subject('Government Projects');
			$crud->fields('pillar_id', 'project_title','project_image');
			$crud->required_fields('project_title','pillar_id');

			$crud->set_field_upload('project_image','uploads/images');
            $crud->set_relation('pillar_id','pillars','pillar');

			$output = $crud->render();

			$this->_settings_output($output);
	}
	public function units()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('units');
			$crud->columns('unit_name');
			$crud->display_as('unit_name','Unit Name');
			 
				 

			$crud->set_subject('Units of Measure');
			$crud->required_fields('unit_name');
            $crud->fields('unit_name');
			

			$output = $crud->render();

			$this->_settings_output($output);
	}
	public function indicators()
	{
			$crud = new ajax_grocery_CRUD();

			$crud->set_table('indicators');
			$crud->columns('category_id','indicator_description','unit','weight','formula');
			$crud->display_as('unit','Unit Name')
			->display_as('category_id','Category Name');

			$crud->set_subject('Contract Indicators');

			$crud->required_fields('category_id','indicator_description','unit','weight','formula');

			$crud->set_relation('category_id','indicator_categories','indicator_category');
			$crud->set_relation('unit','units','unit_name');
			$crud->set_relation('formula','formulas','formula_name');
			$crud->set_relation('pillar_id','pillars','pillar');
           		$crud->set_relation('pr_id','projects','project_title');
			$crud->set_relation_dependency('pr_id','pillar_id','pillar_id');
            		//$crud->fields('category_id','indicator_description','unit','weight','formula');
			

			$output = $crud->render();

			$this->_settings_output($output);
	}
  	function insert_users($post_array,$primary_key)
    {
        if (strlen($post_array['password']) != 32) {
            $post_array['password'] = md5($post_array['password']);
        }
        return $post_array;
    }
}
?>