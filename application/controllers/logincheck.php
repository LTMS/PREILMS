<?php
class Logincheck extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('SimpleLoginSecure');
		$this->session->set_userdata("adminpage",0);
		$this->load->model('lms_model');
		$this->load->library('My_PHPMailer');
	}

	function index()
	{
		$data["menu"]='sales';
		$data["submenu"]='sales';
		$this->template->write('sideTitle', 'Main Menu');
		$this->template->write('titleText', "Login Form");
		//$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'general/myContent');
		$this->template->render();
	}

	/* function ims()
	 {
		if($this->session->userdata('admin_logged_in')) {
		redirect("/ims/index");
		} else {
		$this->template->write('title', 'Indent Management System');
		$this->template->write_view('body', 'ims/login_form');
		$this->template->write_view('sidelinks', 'sidelinks/home_links');
		$this->template->render();
		}
		} */

	function login()
	{
		if($this->session->userdata('admin_logged_in')) {
			redirect("/lms/index");
		} else {
			$email = $this->input->post('email');
			$pwd = $this->input->post('pwd');

			if($this->simpleloginsecure->login($email, $pwd)) {
				redirect("/lms/index");

			}
			else {
				$err = "Wrong Credentials";
				$data["err"] = $err;
				$data["menu"]='sales';
				$data["submenu"]='sales';
				$this->template->write_view('bodyContent', 'general/myContent',$data);
				$this->template->write_view('sideLinks', 'general/menu');
				$this->template->render();
			}
		}
	}



	function logout()
	{
		$this->simpleloginsecure->logout();
		redirect("general");
	}

	function create()
	{
		$form_data = $this->input->post();
		$uname=$form_data["u_name"];
		$username=$form_data["username"];
		$passwd=$form_data["passwd"];
		$userrole=$form_data["userrole"];
		$desig=$form_data["desig"];
		$dept=$form_data["dept"];
		$l1=$form_data["L1"];
		$l2=$form_data["L2"];
		$doj=$form_data["doj"];
		$mail=$form_data["email"];
		$to_id=$form_data["to_id"];
			
		$addedname=$this->session->userdata('admin_user_email');
		$data["result"]=$this->lms_model->add_team_table($uname,$dept,$desig,$doj,$l1,$l2);
		$data["result"]=$this->lms_model->add_employee_details($uname);
		$this->simpleloginsecure->create($uname,$username,$passwd,$userrole,$addedname,$mail,$to_id);
		$this->AccountMail($username,$passwd,$mail);
		redirect("users/add_new_user");
	}

	function adduser(){

		$this->template->write_view('sideLinks', 'general/menu');
		$this->template->write_view('bodyContent', 'general/adduser');
		$this->template->render();
	}

	function updateuser(){
		$form_data = $this->input->post();
		$uname=$form_data["u_name"];
		$username=$form_data["username"];
		$passwd=$form_data["passwd"];
		$userrole=$form_data["userrole"];
		$to_id=$form_data["to_id"];

		$this->simpleloginsecure->update($uname,$username,$passwd,$userrole,$to_id);
		echo "User Information updated successfully";
	}


	function update_details(){
		$result= $this->input->post();
		//	echo $result["name"];
		$this->simpleloginsecure->update_details($result["name"],$result["pwd"],$result["id"]);
		$this->AccountModifiedMail($result["uname"],$result["pwd"],$result["mail"]);
			
	}

	function AccountModifiedMail($UserName,$Password,$mailid){

		$form_data = $this->input->post();
			
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From = 'info@preipolar.com';
		$mail->FromName = 'Administrator';
		$mail->addAddress($mailid);
			
		$mail->isHTML(true);

		$mail->Subject ='Leave Management System Web-Application Account';

		$body1 ="<font size='3pt' color='green'>Your Account Password has been changed  in Leave Management System Successfully..! <br><br> <b>UserName: ".$UserName."<br> New Password: ".$Password."</b><br></font>";
		$mail->Body=$body1;
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}

		echo 'Message has been sent';

	}


	function AccountMail($UserName,$Password,$mailid){

		$form_data = $this->input->post();
			
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From = 'info@preipolar.com';
		$mail->FromName = 'Administrator';
		$mail->addAddress($mailid);
			
		$mail->isHTML(true);

		$mail->Subject ='Leave Management System Web-Application Account';

		$body1 ="<font size='3pt' color='green'>Your Account was created in Leave Management System Successfully..! <br><br> <b>UserName: ".$UserName."<br> Password: ".$Password."</b><br></font>";
		$body2 ="<br> <b><font size='3pt' color='red'> * Please submit your details in the Menu:</font><font color='brown' size='3pt'> <i>My Account Details -> My Profile </i></font><br><br><font size='3pt' color='blue'> Login Now using this link:     http://192.168.2.54:8877/LMS</font>";
		$mail->Body=$body1.$body2;
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}

		echo 'Message has been sent';

	}



}