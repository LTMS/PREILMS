<?php
class Users extends CI_Controller
{   function __construct(){
	parent::__construct();
	$this->load->model('Users_model');
	$this->load->library('SimpleLoginSecure');
	$this->load->library('session');
	if(!$this->session->userdata('admin_logged_in')) {
		redirect("logincheck");
	}
}

function list_users(){
	$data["menu"]='users';
	$data["submenu"]='list_users';
	$data['users']=$this->Users_model->get_users_list();
	$this->template->write('titleText', "Users List");
	$this->template->write_view('sideLinks', 'general/menu',$data);
	$this->template->write_view('bodyContent', 'users/listusers',$data);
	$this->template->render();
}

function add_new_user(){
	$data["menu"]='users';
	$data["submenu"]='add_new_user';
	$data["deptlist"]=$this->Users_model->get_dept();
	$this->template->write('titleText', "Add New User");
	$this->template->write_view('sideLinks', 'general/menu',$data);
	$this->template->write_view('bodyContent', 'users/adduser',$data);
	$this->template->render();
}

function employee_details(){
	$data["menu"]='my_account';
	$data["submenu"]='employee_details';
	$data["details"]=$this->Users_model->getDetails($this->session->userdata('fullname'));
	$data["details1"]=$this->Users_model->getDetails1($this->session->userdata('fullname'));
	$this->template->write('titleText', "Employee Details");
	$this->template->write_view('sideLinks', 'general/menu',$data);
	$this->template->write_view('bodyContent', 'users/employee_details',$data);
	$this->template->render();
}


function fetch_user_info($user_id)
{
	$data['user_info'] = $this->Users_model->get_user_info($user_id);
	$this->load->view("users/user_info_form",$data);

}
function remove_user_info($user_id)
{
	$form_data = $this->input->post();
	$this->Users_model->remove_user_info($form_data["user_id"],$form_data["name"]);

}

function check_username($username)
{
	$username=str_replace('%20',' ', $username);
	echo $this->Users_model->check_username($username);
}

function check_name($username)
{
	$username=str_replace('%20',' ', $username);
	echo $this->Users_model->check_name($username);
}


function get_team_leader(){
	$form_data = $this->input->post();
	echo $this->Users_model->get_team_leader($form_data['dept']);
		
}

function updateEmployees_Details1(){
	$form_data = $this->input->post();
	$this->Users_model->updateEmployees_Details1($form_data['name'],$form_data['f_name'],$form_data['gender'],$form_data['blood'],$form_data['sub_blood'],$form_data['dob'],$form_data['marital'],$form_data['mail'],$form_data['doj']);
	//	$this->Users_model->update_admin_users($form_data['name'],$form_data['mail'],$form_data['doj']);
}

function updateEmployees_Details2(){
	$form_data = $this->input->post();
	$this->Users_model->updateEmployees_Details2($form_data['name'],$form_data['mobile'],$form_data['phone'],$form_data['desig'],$form_data['pf'],$form_data['bank'],$form_data['branch'],$form_data['accno'],$form_data['insur']);
}

function updateEmployees_Details3(){
	$form_data = $this->input->post();
	$this->Users_model->updateEmployees_Details3($form_data['name'],$form_data['adr1'],$form_data['adr2'],$form_data['adr3'],$form_data['city'],$form_data['state'],$form_data['country'],$form_data['post']);
}

function updateEmployees_Details4(){
	$form_data = $this->input->post();
	$this->Users_model->updateEmployees_Details4($form_data['name'],$form_data['Eadr1'],$form_data['Eadr2'],$form_data['Eadr3'],$form_data['Ecity'],$form_data['Estate'],$form_data['Ecountry'],$form_data['Epost']);
	$this->Users_model->updateEmployees_Details5($form_data['name'],$form_data['adr1'],$form_data['adr2'],$form_data['adr3'],$form_data['city'],$form_data['state'],$form_data['country'],$form_data['post']);
}
function Users_Info()
{
	$data["menu"]='misc';
	$data["submenu"]='users_info';
	$data["result"]=$this->Users_model->Users_Info();
	$this->template->write('titleText', "Employees Profile");
	$this->template->write_view('sideLinks', 'general/menu',$data);
	$this->template->write_view('bodyContent', 'users/users_info',$data);
	$this->template->render();
}

}
?>