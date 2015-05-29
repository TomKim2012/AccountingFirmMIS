<?php
class Default_model extends CI_Model {
	
	//private $tbl_bill= 'bills_table';
	
	function __construct(){
		parent::__construct();
	}
	
	
	function gender() {
 
      $gender = array();
 	  $gender[''] = "Select Gender";
	  $gender['MALE'] = "MALE";
	  $gender['FEMALE'] = "FEMALE";
	  return $gender;

  	}
  	function nationality() {

	  $nationality = array();
 	  $nationality[''] = "Select Nationality";
	  $nationality['KENYA'] = "KENYA";
	  $nationality['UGANDA'] = "UGANDA";
	  return $nationality;

  	}
	
	function salutation() {

	  $salutation = array();
 	  $salutation[''] = "Select Salutation";
	  $salutation['Mr'] = "Mr";
	  $salutation['Mrs'] = "Mrs";
	  return $salutation;

  	}
	
	function education_type() {

	  $salutation = array();
 	  $salutation[''] = "Select Education Type";
	  $salutation['ACADEMIA'] = "ACADEMIA";
	  $salutation['PROFESSIONALACCEXAMS'] = "PROFESSIONAL ACC EXAMS";
	  return $salutation;

  	}
	
	function training_type() {

	  $salutation = array();
 	  $salutation[''] = "Select Training Type";
	  $salutation['TRAINING'] = "TRAINING";
	  $salutation['GENERALEXPERIENCE'] = "GENERAL EXPERIENCE";
	  $salutation['AUDITEXPERIENCE'] = "AUDIT EXPERIENCE";
	  return $salutation;

  	}
  	
  	
}
?>