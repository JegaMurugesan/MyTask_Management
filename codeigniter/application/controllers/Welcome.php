<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->library('session');
        $this->load->model('Common_model', 'mcommon');
    }
	public function index()
	{
		//$data['value'] = $this->mcommon->records_all('tbl_posts');
		
		//print_r($data['value']);die;
		$this->load->view('login');
	}
	public function redirect()
	{
		//$data['value'] = $this->mcommon->records_all('tbl_posts');
		if(!empty($this->session->userdata('id'))){
		//print_r($data['value']);die;
		$datas['value'] = $this->mcommon->records_all('tbl_posts');
				$this->load->view('welcome_message',$datas);
		}else{
			redirect(base_url('index.php/Welcome'), 'refresh');
		}		
	}
	public function taskdetails()
	{
		if(!empty($this->input->post('username')))
		{
			$wherearry= array(
							'name' => $this->input->post('username'),
							'password' => $this->input->post('password')
							);
							
							
			$data = $this->mcommon->records_all('tbl_login',$wherearry);
			
			//print_r($data);die;
			foreach($data as  $val){
				$verif = array(
				'name' => $val->name,
				'id' => $val->id,
				);
				
				$name = $val->name;
				$id = $val->id;
				$s = $this->session->set_userdata($verif);
				 //$this->session->set_userdata('verified', $verif);
				//$this->session->set_userdata($id)
			}
			//echo $this->session->userdata('name');die;
			if($id>0){
				
				//$array_sess_items1 = array('successMsg' => 'Task Added Successfully');
				//$this->session->set_userdata($array_sess_items1);
				$datas['value'] = $this->mcommon->records_all('tbl_posts');
				$this->load->view('welcome_message',$datas);
			}else{
				
				//$array_sess_items = array('error' => 'Username or Password Incorrect');
				//$this->session->set_userdata($array_sess_items);
				//$this->load->view('welcome_message'); 
				redirect(base_url('index.php/Welcome'), 'refresh');
			}
		}else{
			
			redirect(base_url('index.php/Welcome'), 'refresh');
		}
		//print_r($data['value']);die;
		
	}
	public function create()
	{
		if(!empty($this->session->userdata('id'))){
		$this->load->view('addTask');
		
		}else{
			redirect(base_url('index.php/Welcome'), 'refresh');
		}
	}
	public function save()
	{
		$name = $this->input->post('uname');
		if(!empty($name)){
			
		
		//echo $name;die;
		// $description = $this->input->post('desc');
		$value_array=array(
					'name'             =>   $this->input->post('uname'),     
					'description'         =>   $this->input->post('desc'), 
					'date_created'         =>  date("Y-m-d")
		
		);
		$result1 = $this->mcommon->common_insert('tbl_posts',$value_array);
		
		if($result1){
			
			//$array_sess_items = array('successMsg' => 'Task Added Successfully');
           // $this->session->set_userdata($array_sess_items);
            //$this->load->view('welcome_message'); 
			redirect(base_url('index.php/Welcome/redirect'), 'refresh');
		}
	 }else{
		 redirect(base_url('index.php/Welcome/create'), 'refresh');
		 
	 }
	}
	public function edit($id='')
	{
		//$sid = $id;
		//echo $sid;
		if(!empty($id)){
		$where_array    	=   array('id'=>$id);
        $data['value']  	=   $this->mcommon->records_all('tbl_posts',$where_array);
		//print_r($data);die;
		$this->load->view('editTask',$data);}else{
		 redirect(base_url('index.php/Welcome'), 'refresh');	
		}
	}
	
	public function update()
	{
		//$name = $this->input->post('uname');
		// $description = $this->input->post('desc');
		//echo $name;die;
		//if(!empty($this->session->userdata('id'))){
				$value_array=array(
							'name'             =>   $this->input->post('uname'),     
							'description'         =>   $this->input->post('desc'),      
							'update_date'         =>  date("Y-m-d")      
				
				);
				$where_array    =   array('id'=>$this->input->post('id'));
				$resultupdate	=	$this->mcommon->common_edit('tbl_posts', $value_array, $where_array);
				if($resultupdate){
					
					//$array_sess_items = array('successMsg' => 'Updated Successfully');
				  //  $this->session->set_userdata($array_sess_items);
					//$this->load->view('welcome_message'); 
					redirect(base_url('index.php/Welcome/redirect'), 'refresh');
				 }else{
					 redirect(base_url('index.php/Welcome/redirect'), 'refresh');
				 }
		//}else{
			
			//redirect(base_url('index.php/Welcome'), 'refresh');
		//}
			
	}
	public function delete($id='')
	{
		//$sid = $id;
		//echo $sid;
		if(!empty($id)){
		$where_array    	=   array('id'=>$id);
        $data['value']  	=   $this->mcommon->common_delete('tbl_posts',$where_array);
		//print_r($data);die;
		redirect(base_url('index.php/Welcome/redirect'), 'refresh');
		}else{
			
			redirect(base_url('index.php/Welcome'), 'refresh');
		}
	}
	public function logout($id='')
	{
		$this->session->sess_destroy();
       // redirect('default_controller');
		//print_r($data);die;
		redirect(base_url('index.php/Welcome'), 'refresh');
	}
}
