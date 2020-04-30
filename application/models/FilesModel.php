<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilesModel extends CI_Model {
	function __construct() {
		$this->tableName = 'files';
		$this->primaryKey = 'id';
	}
	
	public function add_files($data){
        	$insert = $this->db->insert('files', $data);
       return true;
    }
    
    public function filesDetails(){
    	$query = $this->db->query("select * from files order by id desc");
       	return $query->result();
    }

    function getFile($filename){
          $this->db->select('*');
			$this->db->from('files');
			$this->db->where(array('fileName'=>$filename));
			$prevQuery = $this->db->get();
			$prevCheck = $prevQuery->num_rows();
			
			if($prevCheck > 0){
               
			     return $prevQuery->result();
			}else{
			 return FALSE;
			}
    }

    function delete_file($filename){
           $this->db->where('fileName', $filename);
            $this->db->delete('files'); 
            
        return true;
    }
    
    
}