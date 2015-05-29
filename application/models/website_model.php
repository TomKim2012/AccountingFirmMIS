<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* -- Solutech Limited --
      Orders Model for Orders Management Module Database Access
*/
	class Website_model extends CI_Model {


           function list_firms()
		   {
				$this->db->select('*');
				$this->db->from('auditfirms');
				
				
				$query=$this->db->get();

				if($query->num_rows() > 0){

				foreach ($query->result() as $row) {
					# code...
					$data[]= $row;	
				}
					
					}
					else{
							$data=NULL;
						}
					return $data;


			}

                  function list_resources()
		   {
				$this->db->select('*');
				$this->db->from('kb_article');
				
				
				$query=$this->db->get();

				if($query->num_rows() > 0){

				foreach ($query->result() as $row) {
					# code...
					$data[]= $row;	
				}
					
					}
					else{
							$data=NULL;
						}
					return $data;


			}



		} 
