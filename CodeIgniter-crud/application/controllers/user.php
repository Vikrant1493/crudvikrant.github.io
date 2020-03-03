<?php

class User extends CI_controller
{
	function index()
	{
		$this->load->model('User_model');
		$users= $this->User_model->all();
		$data= array();
		$data['users']= $users;
		$this->load->view('list',$data);
	}
	function create()
	{
		$this->load->model('User_model');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('mobile_no','Mobile_No','required');
		$this->form_validation->set_rules('dob','dob','required');
		$this->form_validation->set_rules('pin_code','Pin_Code','required');

		if ($this->form_validation->run() == false) {
		$this->load->view('create');
		}
		else
		{
			$formArray= array(); 
			$formArray['name']= $this->input->post('name');
			$formArray['email']= $this->input->post('email');
			$formArray['mobile_no']= $this->input->post('mobile_no');
			$formArray['dob']= $this->input->post('dob');
			$formArray['pin_code']= $this->input->post('pin_code');
			
			$this->User_model->create($formArray);
			$this->session->set_flashdata('success','Record added successfully');
			redirect(base_url().'index.php/user/index');
		}
	} 
			function edit($id)
			{
				$this->load->model('User_model');
				$user= $this->User_model->getUser($id);
				$data= array();
				$data['user']= $user;

				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('mobile_no','Mobile_No','required');
				$this->form_validation->set_rules('dob','dob','required');
				$this->form_validation->set_rules('pin_code','Pin_Code','required');

				if($this->form_validation->run() == false) 
				{
					$this->load->view('edit',$data);
				}
				else
				{
					$formArray= array();
					$formArray['name']=$this->input->post('name');
					$formArray['email']=$this->input->post('email');
					$formArray['mobile_no']=$this->input->post('mobile_no');
					$formArray['dob']=$this->input->post('dob');
					$formArray['pin_code']=$this->input->post('pin_code');
					
					$this->User_model->updateUser($id,$formArray);
					$this->session->set_flashdata('success','Record Updated successfully' );
					redirect(base_url().'index.php/user/index');
				}

			}
				function delete($id)
				{
					$this->load->model('User_model');
					$user = $this->User_model->getUser($id);
					if (empty($user)) {
						$this->session->set_flashdata('failuer','Record Not Found in Database');
						redirect(base_url().'index.php/user/index');
					}
						$this->User_model->deleteUser($id);
						$this->session->set_flashdata('success','Record Deleted successfully');
						redirect(base_url().'index.php/user/index');
				}

}


?>