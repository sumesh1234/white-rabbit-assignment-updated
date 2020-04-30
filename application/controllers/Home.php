<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

        $this->load->model('FilesModel');

    }
	
	public function index()
	{
        $data['error']="";

		$this->load->helper(array('form', 'url'));
        $this->load->helper('directory');
        $data['directory_items'] = directory_map('./uploads/', FALSE, TRUE);

        $this->load->library('form_validation');
        $this->load->view('home', $data);

	}


    public function upload()
    {
        $data['error']="";

        $this->load->helper(array('form', 'url'));
        $this->load->helper('directory');
        $data['directory_items'] = directory_map('./uploads/', FALSE, TRUE);

        $this->load->library('form_validation');

        

        $config['upload_path']          = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|txt|doc|docx|pdf|gif';  
                $config['max_size'] = 2000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $data['error'] =  $this->upload->display_errors();

                        $this->load->view('upload', $data);
                }
                else
                {
                    $data = $this->upload->data();  
                      $fileName = $data["file_name"];
                      $date=date('Y-m-d');
                         $data = array(
                        'fileName' => $fileName,
                        'uploaded' => $date,
                        );

                       $fileName = $this->FilesModel->add_files($data);
                    redirect('/Home/');
                }
    }
    public function upload_history()
    {
        $data['files'] = $this->FilesModel->filesDetails();    
            
        $this->load->view('upload_history',$data);

    }

    public function delete()
    {
        
        $filename = $this->input->post('filename', TRUE);

        $get_img = $this->FilesModel->getFile($filename);
       

        if($get_img){
            if($get_img[0]->fileName!=""){
                 
                    if(unlink('uploads/'.$get_img[0]->fileName)) {
                     
                    }
            }
        }
        
        $delete_imge = $this->FilesModel->delete_file($filename);
        if($delete_imge){
            echo "success";
        }else{
            echo  "error";
        }
       
    }
}
