<?php
class Lms extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('SimpleLoginSecure');
		$this->load->library('Export_emp_leave_history');
		$this->load->library('My_PHPMailer');
		$this->load->model('lms_model');
		$this->load->model('summary_model');
		$this->load->model('otsummary_model');
		$this->load->helper('url');
		$this->load->library('AllEmp_leave_history_dwnld');
		$this->load->library('session');
		if(!$this->session->userdata('admin_logged_in'))
		{
			redirect("logincheck");
		}

	}


	function index()
	{


		$urole=$this->session->userdata('userrole');
		if($urole == 'MD')
		{
			$data["menu"]='LMS';
			$data["submenu"]='lms_intro';
			$this->template->write('titleText', "Leave Criteria");
			$data["Param"]=$this->lms_model->get_parameters();
			$this->template->write_view('sideLinks', 'general/menu',$data);
			$this->template->write_view('bodyContent', 'lms/lms_intro_admin',$data);
			$this->template->render();
		}
		else{
			$data["menu"]='LMS';
			$data["submenu"]='lms_intro';
			$data["Param"]=$this->lms_model->get_parameters();
			$this->template->write('titleText', "Leave Criteria");
			$this->template->write_view('sideLinks', 'general/menu',$data);
			$this->template->write_view('bodyContent', 'lms/lms_intro',$data);
			$this->template->render();
		}
	}


	function apply()
	{
		$urole=$this->session->userdata('userrole');
		if($urole == 'MD')
		{
			$data["menu"]='LMS';
			$data["submenu"]='pending_applications';
			$data["result"]=$this->lms_model->get_pending_applicatoins();
			$this->template->write('titleText', "Pending Leave Applications");
			$this->template->write_view('sideLinks', 'general/menu',$data);
			$this->template->write_view('bodyContent', 'lms/pending_applications',$data);
			$this->template->render();
		}
		else{
			$data["menu"]='LMS';
			$data["submenu"]='apply';
			$data["approv"]=$this->lms_model->get_approval_officer();
			$data["summary"]=$this->lms_model->get_leave_summary();
			$data["summary_year"]=$this->lms_model->get_leave_summary_year();
			$data["summary_pend"]=$this->lms_model->get_leave_summary_pend();
			$data["carry_forward"]=$this->lms_model->carry_forward_on();
			$data["doj"]=$this->lms_model->get_doj();
			$data["Total_OT"]=$this->otsummary_model->get_ot_for_applyPage();
			$data["Comp_Hours"]=$this->otsummary_model->get_CompOff_for_applyPage();
			$data["Param"]=$this->lms_model->get_parameters();
			$data["perm"]=$this->lms_model->get_allpermissions(date('Y'),date('m'));
			//	$data["perm"]=$this->otsummary_model->get_employee_total_ot(date('Y'),date('m'));
			$this->template->write('titleText', "Apply For Leave");
			$this->template->write_view('sideLinks', 'general/menu',$data);
			$this->template->write_view('bodyContent', 'lms/apply',$data);
			$this->template->render();
		}
	}



	function leave_others()
	{
		$data["menu"]='LMS';
		$data["submenu"]='apply_others';
		$data["technicians"]=$this->lms_model->get_technicians();
		$this->template->write('titleText', "Leave Status");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/apply_others',$data);
		$this->template->render();
	}


	function permissions()
	{
		$data["menu"]='LMS';
		$data["submenu"]='permissions';
		$data["result"]=$this->lms_model->get_pending_permissions();
		$this->template->write('titleText', "Pending Permissions");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/permissions',$data);
		$this->template->render();
	}




	function status()
	{

		$data["menu"]='LMS';
		$data["submenu"]='status';
		$this->template->write('titleText', "Leave Status");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/status',$data);
		$this->template->render();
	}

	function add_dept(){
		$data["menu"]='misc';
		$data["submenu"]='add_dept';
		$data["deptlist"]=$this->lms_model->get_dept();
		$this->template->write('titleText', "Manage Departments");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/add_dept',$data);
		$this->template->render();
	}

	function my_leave_history()
	{
		$data["menu"]='LMS';
		$data["submenu"]='my_leave_history';
		$this->template->write('titleText', "My Leave History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/my_leave_history',$data);
		$this->template->render();
	}


	function my_leave_summary()
	{
		$emp=$this->session->userdata("fullname");
		$data["title"]="Leave Summary of ".$emp." for ".date('Y');
		$data["menu"]='LMS';
		$data["submenu"]='my_summary';
		$data['years']=$this->lms_model->get_years();
		$data['summary']=$this->summary_model->get_my_summary(date('Y'));
		$data['total']=$this->summary_model->get_my_summary_total(date('Y'));
		$data["perm"]=$this->summary_model->get_my_permission(date('Y'));
		$data["perm_tot"]=$this->summary_model->get_my_permission_total(date('Y'));

		$this->template->write('titleText', "My Leave Summary");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/my_leave_summary',$data);
		$this->template->render();
	}

	function leave_summary()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='summary';
		$data["deptlist"]=$this->lms_model->get_dept();
		$data["teamlist"]=$this->lms_model->get_team();
		$data["members"]=$this->lms_model->get_leave_members();
		$data['years']=$this->lms_model->get_years();
		$this->template->write('titleText', "Employees Leave Summary");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/leave_summary',$data);
		$this->template->render();
	}

	function leave_summary_md()
	{
		$data["menu"]='LMS';
		$data["submenu"]='summary';
		$data["deptlist"]=$this->lms_model->get_dept();
		$data["teamlist"]=$this->lms_model->get_team();
		$data["members"]=$this->lms_model->get_leave_members();
		$data['years']=$this->lms_model->get_years();
		$this->template->write('titleText', "Employees Leave Summary");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/leave_summary',$data);
		$this->template->render();
	}

	function leave_reprocess()
	{
		$data["menu"]='LMS';
		$data["submenu"]='reprocess';
		$data["members"]=$this->lms_model->get_leave_members();
		$data['years']=$this->lms_model->get_years();
		$this->template->write('titleText', "Reprocess Approved Leaves");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/reprocess_leave',$data);
		$this->template->render();
	}

	function pending_applications()
	{
		$data["menu"]='LMS';
		$data["submenu"]='pending_applications';
		$data["result"]=$this->lms_model->get_pending_applicatoins();
		$this->template->write('titleText', "Pending Leave Applications");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/pending_applications',$data);
		$this->template->render();
	}

	function pending_applications_lev1()
	{
		$data["menu"]='LMS';
		$data["submenu"]='pending_applications_lev1';
		$data["result"]=$this->lms_model->get_pending_applicatoins_lev1();
		$this->template->write('titleText', "Pending Leave Applications");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/pending_applications',$data);
		$this->template->render();
	}



	function lop_admin()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='lop_admin';
		$data["year"]=$this->lms_model->get_LOP_years();
		$data["LOP_List"]=$this->lms_model->get_lop_overall(date('Y'));
		$data["members"]=$this->lms_model->get_leave_members();
		$this->template->write('titleText', "Update LOP");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/lop_admin',$data);
		// $this->template->write_view('bodyContent', 'lms/lop_admin_div',$data);
		$this->template->render();
	}

	function my_lop()
	{
		$data["menu"]='LMS';
		$data["submenu"]='my_lop';
		$data["year"]=$this->lms_model->get_LOP_years();
		$data["LOP_List"]=$this->lms_model->get_lop_overall_emp(date('Y'));
		$this->template->write('titleText', "My LOP");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/lop_employee',$data);
		$this->template->render();
	}

	function md_permission()
	{
		$data["menu"]='LMS';
		$data["submenu"]='md_permission';
		$data["year"]=$this->lms_model->get_permission_years();
		$data["members"]=$this->lms_model->get_leave_members();
		$data["Permission"]=$this->lms_model->admin_permission(date('Y'));
		$this->template->write('titleText', "Permission History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/admin_permission',$data);
		$this->template->render();
	}

	function admin_permission()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='admin_permission';
		$data["year"]=$this->lms_model->get_permission_years();
		$data["members"]=$this->lms_model->get_leave_members();
		$data["Permission"]=$this->lms_model->admin_permission(date('Y'));
		$this->template->write('titleText', "Permission History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/admin_permission',$data);
		$this->template->render();
	}

	function my_permission()
	{
		$emp=$this->session->userdata("fullname");
		$data["title"]="Permissions of ".$emp." for ".date('Y');
		$data["menu"]='LMS';
		$data["submenu"]='my_permission';
		$data["year"]=$this->lms_model->my_permission_years();
		$data["Permission"]=$this->lms_model->get_my_permission(date('Y'));
		$this->template->write('titleText', "My Permission History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/my_permission',$data);
		$this->template->render();
	}

	function history_admin()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='history_admin';
		$data["years"]=$this->lms_model->get_years();
		$data["leavelist"]=$this->lms_model->get_leavelist();
		$data["deptlist"]=$this->lms_model->get_dept();
		$data["teamlist"]=$this->lms_model->get_team();
		$data["members"]=$this->lms_model->get_leave_members();
		$this->template->write('titleText', "Employees Leave History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/history_admin',$data);
		$this->template->render();
	}

	function history_md()
	{
		$data["menu"]='LMS';
		$data["submenu"]='history_admin';
		$data["years"]=$this->lms_model->get_years();
		$data["deptlist"]=$this->lms_model->get_dept();
		$data["teamlist"]=$this->lms_model->get_team();
		$data["members"]=$this->lms_model->get_leave_members();
		$this->template->write('titleText', "Employees Leave History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/history_admin',$data);
		$this->template->render();
	}

	function history_teamleader()
	{
		$data["menu"]='LMS';
		$data["submenu"]='history_teamleader';
		$data["members"]=$this->lms_model->get_team_members();
		$this->template->write('titleText', "Department Leave History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/history_teamleader',$data);
		$this->template->render();
	}

	function manage_technic()
	{
		$data["menu"]='misc';
		$data["submenu"]='manage_technic';
		$data["tech"]=$this->lms_model->get_technicians_details();
		$this->template->write('titleText', "Manage Technicians");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/manage_technic',$data);
		$this->template->render();
	}

															/* * *  Leader Leave History		* * */
	
		function history_team()	{
		$data["menu"]='team_reports';
		$data["submenu"]='history_team';
		$data["years"]=$this->lms_model->get_years();
		$data["leavelist"]=$this->lms_model->get_leavelist();
		$data["members"]=$this->lms_model->get_team_members();
		$this->template->write('titleText', "Employees Leave History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/team_history',$data);
		$this->template->render();
	}

	function team_permission()	{
		$data["menu"]='team_reports';
		$data["submenu"]='team_permission';
		$data["year"]=$this->lms_model->get_permission_years();
		$data["members"]=$this->lms_model->get_team_members();
		//$data["Permission"]=$this->lms_model->admin_permission(date('Y'));
		$this->template->write('titleText', "Permission History");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/team_permission',$data);
		$this->template->render();
	}

		function team_leave_summary()	{
		$data["menu"]='team_reports';
		$data["submenu"]='team_leave_summary';
		$data["members"]=$this->lms_model->get_team_members();
		$data['years']=$this->lms_model->get_years();
		$this->template->write('titleText', "Employees Leave Summary");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'lms/team_leave_summary',$data);
		$this->template->render();
	}
	
	
	function change_leave_type()
	{
		$form_data = $this->input->post();
		$result=$this->lms_model->checkLeaveAvailability($form_data["counter"]);
			
	}


	function insert_other_application()
	{
			
		$form_data = $this->input->post();
		echo $this->lms_model->insert_other_application($form_data["uname"],$form_data["leave_type"],$form_data["date1"],$form_data["date2"],$form_data["days"],$form_data["officer"],$form_data["reason"]);

	}
		

	function calculate_days()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$date2 = $form_data["date_to"];

		$start_ts = strtotime($date1);
		$end_ts = strtotime($date2);
		$diff = $end_ts - $start_ts;
		echo round($diff / 86400)+1;

	}

	function calculate_workingdays()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$date2 = $form_data["date_to"];

		$start_ts = strtotime($date1);
		$end_ts = strtotime($date2);
		$diff = $end_ts - $start_ts;
		$days= round($diff / 86400)+1;
			
		$result=$this->lms_model->calculate_workingdays($form_data["date_from"],$form_data["date_to"]);
		foreach($result as $row){
			$tot= $row["total"];
			$holidays= $row["holidays"];
			$leave= $row["leaves"];
			$sundays= $row["sundays"];
		}
		echo $interval=$days-$tot.'::'.$holidays.'::'.$leave.'::'.$days.'::'.$sundays;

	}

	function calculate_prior()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$date2 =date('d-m-Y');

		$start_ts = strtotime($date2);
		$end_ts = strtotime($date1);
		$diff = $end_ts - $start_ts;
		echo round($diff / 86400);

	}

	function check_leavetaken()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$result=$this->lms_model->check_leavetaken($date1);
		foreach($result as $row){
			echo $row["avail"];
		}
	}

	function check_holidays()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$holiday=$this->lms_model->check_holidays($date1);
		foreach($holiday as $row){
			$avail= $row["avail"];
			$desc= $row["holi_desc"];
			echo $result=$avail.'::'.$desc;
		}
	}

	function check_sunday()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$result=$this->lms_model->check_sunday($date1);
		foreach($result as $row){
			echo $row["day"];
		}
	}

	function validate_casual()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$result=$this->lms_model->validate_casual($date1);
		if(empty($result)){	echo 0;	}
		else{
			foreach($result as $row){
				echo $row["day"];
			}
		}
	}

	function check_prior_CL()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$result=$this->lms_model->check_prior_CL($date1);
		if(empty($result)){	echo 0;	}
		else{
			foreach($result as $row){
				echo $row["days"];
			}
		}
	}

	function validate_permission()
	{
		$form_data = $this->input->post();
		$date1 = $form_data["date_from"];
		$result=$this->lms_model->validate_permission($date1);
		if(empty($result)){	echo 0;	}
		else{
			foreach($result as $row){
				echo $row["status"];
			}
		}
	}

	function calculate_experience()
	{
		$form_data = $this->input->post();
		$date1 =$form_data["then"];
		$date2 = $form_data["now"];

		$ts1 = strtotime($date1);
		$ts2 = strtotime($date2);

		$year1 = date('Y', $ts1);
		$year2 = date('Y', $ts2);

		$month1 = date('m', $ts1);
		$month2 = date('m', $ts2);

		$diff = (($year2 - $year1) * 12) + ($month2 - $month1);

		echo $diff;
	}


	function check_leave()
	{
		$form_data = $this->input->post();
		$date =$form_data["now"];
		$type =$form_data["l_type"];
		$d=date('Y',strtotime($date)).'-'.date('m',strtotime($date));
		//$d=date('Y', strtotime($date));
		//	echo $d;
		$result=$this->lms_model->check_leave($d,$type);
		foreach($result as $row){
			echo $row["Leaves"];
		}
		//echo $result;
	}


	function insert_application_data()
	{
			
		$form_data = $this->input->post();
		echo $this->lms_model->insert_application_data($form_data["leave_type"],$form_data["date1"],$form_data["date2"],$form_data["days"],$form_data["officer"],$form_data["reason"],$form_data["hrs"]);


	}


	function get_leave_status()
	{
		$form_data = $this->input->post();
		$type = $form_data["type"];
		if($type=='AllTypes'){	$title_type='Leave';	}
		else if($type=='4'){$title_type='Approved (MD) Leave';}
		else if($type=='2'){$title_type='Approved (TL) Leave';}
		else if($type=='3'){$title_type='Rejected Leave';}
		else{$title_type=$type;}
		$name=$this->session->userdata("fullname");
		$data["reminder"]=$this->lms_model->get_reminder_limit();
		$data["result"]=$this->lms_model->get_leave_status($form_data["d1"],$form_data["d2"],$type);
		if($type=='1'){
			$data["title"]="Pending / Expired Leave Application";
			$this->load->view('lms/leave_status_noaction',$data);
		}
		else{
			$data["title"]=$title_type." History of ".$name." from ".$form_data["d1"]." - ".$form_data["d2"];
			$this->load->view('lms/history_left',$data);
			$this->load->view('lms/leave_status',$data);
		}
	}

	function admin_leavehistory_general_all(){
		$form_data = $this->input->post();
		$month=$form_data["month"];

		if($month=='All'){
			$data["title"]="Leave History of ".$form_data["emp"]." for ".$form_data["year"];
			$data["result"]=$this->lms_model->admin_leavehistory_general_all($form_data["year"],$form_data["month"],$form_data["emp"]);
			$this->load->view('lms/admin_leavehistory_page_emp',$data);
			$this->load->view('lms/admin_leavehistory_general_print',$data);
		}
		if($month!='All'){
			$data["title"]="Leave History of ".$form_data["emp"]." for ".$form_data["month"]." - ".$form_data["year"];
			$data["result"]=$this->lms_model->admin_leavehistory_general_month($form_data["year"],$form_data["month"],$form_data["emp"]);
			$this->load->view('lms/admin_leavehistory_page_emp',$data);
			$this->load->view('lms/admin_leavehistory_general_print',$data);
		}

	}

	function admin_leavehistory_general_filter(){
		$form_data = $this->input->post();
		$data["title"]=$form_data["leave"]." History of ".$form_data["emp"]." for ".$form_data["year"];
		$data["result"]=$this->lms_model->admin_leavehistory_general_filter($form_data["year"],$form_data["emp"],$form_data["leave"]);
		$this->load->view('lms/admin_leavehistory_page_emp',$data);
		$this->load->view('lms/admin_leavehistory_general_print',$data);
	}
		
		
	function admin_leavehistory_approved(){
		$form_data = $this->input->post();
		$emp=$form_data["emp"];
		if($emp=='All'){
			$data["title"]="Leave History of ".$form_data["emp"]." for ".$form_data["year"];
			$data["result"]=$this->lms_model->admin_leavehistory_approved_all($form_data["year"]);
			$this->load->view('lms/admin_leavehistory_page_all',$data);
			$this->load->view('lms/admin_leavehistory_approved_all_print',$data);
		}
		else{
			$data["title"]="Leave History of ".$form_data["emp"]." for ".$form_data["year"];
			$data["result"]=$this->lms_model->admin_leavehistory_approved_ind($form_data["year"],$form_data["emp"]);
			$this->load->view('lms/admin_leavehistory_page_all',$data);
			$this->load->view('lms/admin_leavehistory_approved_ind_print',$data);
		}

	}
		

			
	function team_leavehistory_approved(){
		$form_data = $this->input->post();
		$emp=$form_data["emp"];
		$leader=$this->session->userdaata("fullname");
		if($emp=='All'){
			$data["title"]="Leave History of Team".$leader." for ".$form_data["year"];
			$data["result"]=$this->lms_model->team_leavehistory_approved_all($form_data["year"]);
			$this->load->view('lms/admin_leavehistory_page_all',$data);
			$this->load->view('lms/admin_leavehistory_approved_all_print',$data);
		}
		else{
			$data["title"]="Leave History of ".$form_data["emp"]." of ".$leader." for ".$form_data["year"];
			$data["result"]=$this->lms_model->team_leavehistory_approved_ind($form_data["year"],$form_data["emp"]);
			$this->load->view('lms/admin_leavehistory_page_all',$data);
			$this->load->view('lms/admin_leavehistory_approved_ind_print',$data);
		}

	}
		

	
	function get_history_teamleader()
	{
		$form_data = $this->input->post();
			$data["title"]="Leave History of ".$form_data["emp"]." for ".$form_data["year"];
			$data["status"]=$this->lms_model->get_history_teamleader($form_data["d1"],$form_data["d2"],$form_data["string"]);
			$this->load->view('lms/history_teamleader_page',$data);
	}



	function approve()
	{
		$form_data = $this->input->post();
		$remark=$form_data["reason"];
		$data["result"]=$this->lms_model->approve($form_data["lid"],$form_data["reason"]);
		$leave=$this->lms_model->approve_mail($form_data["lid"]);

		foreach($leave as $row){
			$to=$row["Email"];
			$from=$row["FromMail"];
			$days=$row["Days"];
			$date=$row["Date"];
			$time=$row["Time"];
			$status1=$row["Status"];
			$name=$row["User"];
			$type=$row["Type"];
		}
		if($status1=='L1 -  Approved'){
			$status='Team Leader';
		}
		if($status1=='L2 -  Approved'){
			$status='Managing Director';
		}
			
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From = $from;
		$mail->FromName = 'Leave Mailer';
		$mail->addAddress($to);
		$mail->addCC('saravanan@preipolar.com');
		$mail->addCC('info@preipolar.com');

		$mail->isHTML(true);

		$mail->Subject = $name." Your ".$type." was Approved ";

		$c=	"
								<html><body>
									<table border='1' align='center' cellpading='0' cellspacing='0' width='70%' style='color:blue;font-weight:bold;margin: 40px 0px 0px 50px;'>
												<tr >
														<td colspan='2' align='center' style='color:green'>Approved Leave Details</td>
														
												</tr>
												<tr>
														<td align='right'>Leave Type</td>
														<td>$type</td>
												</tr>
												<tr>
														<td align='right'>From Date</td>
														<td>$date</td>
												</tr>
												<tr>
														<td align='right'>No of Days</td>
														<td>$days</td>
												</tr>
											<tr>
														<td align='right'>Applied On</td>
														<td>$time</td>
											</tr>
												<tr>
														<td align='right'>Approved By</td>
														<td>$status</td>
											</tr>
									</table>
							 	  </body></html>";

		$mail->Body =$c;

		//	$mail->Body    = $name." Your ".$type." from ".$date." for ".$days." day(s) applied on ".$time." status is ".$status;
		//	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}

		echo 'Message has been sent';


		$this->load->view('lms/pending_applications',$data);
	}


	function reject(){
		$form_data = $this->input->post();
		$data["result"]=$this->lms_model->reject($form_data["lid"],$form_data["reason"],$form_data["type"],$form_data["user"],$form_data["hrs"]);
		$leave=$this->lms_model->approve_mail($form_data["lid"]);

		foreach($leave as $row){

			$to=$row["Email"];
			$from=$row["FromMail"];
			$days=$row["Days"];
			$date=$row["Date"];
			$time=$row["Time"];
			$status1=$row["Status"];
			$name=$row["User"];
			$type=$row["Type"];
		}
		if($status1=='L1 - Rejected'){
			$status='Team Leader';
		}
		if($status1=='L2 - Rejected'){
			$status='Managing Director';
		}

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From =$from;
		$mail->FromName = 'Leave Mailer';
		$mail->addAddress($to);
		//	$mail->addCC('saravanan@preipolar.com');
		$mail->addCC('info@preipolar.com');

		$mail->isHTML(true);

		$mail->Subject = $name." Your ".$type." was Rejected ";


		$c=	"
								<html><body>
									<table border='1' align='center' cellpading='0' cellspacing='0' width='70%' style='color:blue;font-weight:bold;margin: 40px 0px 0px 50px;'>
												<tr >
														<td colspan='2' align='center' style='color:red'>Rejected Leave Details</td>
														
												</tr>
												<tr>
														<td align='right'>Leave Type</td>
														<td>$type</td>
												</tr>
												<tr>
														<td align='right'>From Date</td>
														<td>$date</td>
												</tr>
												<tr>
														<td align='right'>No of Days</td>
														<td>$days</td>
												</tr>
												<tr>
														<td align='right'>Applied On</td>
														<td>$time</td>
											</tr>
												<tr>
														<td align='right'>Rejected By</td>
														<td>$status</td>
											</tr>
									</table>
							 	  </body></html>";

		$mail->Body =$c;

		//	$mail->Body    = $name." Your ".$type." from ".$date." for ".$days." day(s) applied on ".$time." status is ".$status;
		//	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}

		echo 'Message has been sent';


		$this->load->view('lms/pending_applications',$data);
	}

	function add_depart()
	{
		$form_data = $this->input->post();
		echo $this->lms_model->add_dept($form_data["dept"]);

	}

	function remove_dept()
	{
		$form_data = $this->input->post();
		echo	$this->lms_model->remove_dept($form_data["id"]);
	}



		
	function upload_file($lid){
		$id=$lid;
		$status = "";
		$msg = "";
		$file_element_name = 'fileupload';

		 
		//echo json_encode(array('status' => $status, 'msg' => $msg));
		if ($status != "error")
		{
			$config['upload_path'] = './files/';
			$config['allowed_types'] = 'gif|jpg|png|doc|txt';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($file_element_name))
			{
				$status = 'error';
				$msg = $this->upload->display_errors('', '');
			}
			else
			{
				$data = $this->upload->data();
				$file_id = $this->lms_model->insert_file($data['file_name'],$id);
				if($file_id)
				//if(true)
				{
					$status = "success";
					$msg = "File successfully uploaded";
				}
				else
				{
					unlink($data['full_path']);
					$status = "error";
					$msg = "Something went wrong when saving the file, please try again.";
				}
			}
			@unlink($_FILES[$file_element_name]);
		}
		//  echo json_encode(array('status' => $status, 'msg' => $msg));

		echo json_encode(array('status' => $status, 'msg' => $id));
	}

	function show_document()
	{
		//echo "hello";
		$form_data = $this->input->post();
		echo $this->lms_model->show_document($form_data["lid"]);
		//echo $form_data["lid"];
	}


	function SendMail(){

		$form_data = $this->input->post();
		$sick_limit=$form_data["sick_limit"];
		$holidays_list=$form_data["holidays_list"];
		$l_type=$form_data["l_type"];
		$reason=$form_data["reasoning"];
		$days=$form_data["day"];
		$date=$form_data["date_from"];
		$date2=$form_data["date_to"];
		$type=$form_data["l_type"];

		$result = $this->lms_model->getMailData($form_data["date_from"],$form_data["reasoning"], $form_data["day"],$form_data["l_type"],$form_data["Offr"]);


		foreach($result as $row){

			$to1=$row["ToMail1"];
			$to2=$row["ToMail2"];
			$from=$row["FromMail"];
			$file=$row["filename"];
			$file_count=$row["file_count"];
			$name=$row["Name"];

		}
			
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From = $from;
		$mail->FromName = 'Leave Mailer';

		if($to1==$to2){
			$mail->addAddress($to1);
		}
		else{

			$mail->addAddress($to1);
			$mail->addAddress($to2);
		}
		$mail->addCC('info@preipolar.com');

		if($file_count>0){
			$mail->AddAttachment("files/".$file);
		}
			
		$mail->isHTML(true);

		$mail->Subject = $name."  has applied  ".$type." for ".$days." day(s).";


		$c=	"
								<html><body>
									<table border='1' align='center' cellpading='0' cellspacing='0' width='80%' style='color:blue;font-weight:bold;margin: 40px 0px 0px 50px;'>
												<tr >
														<td colspan='2' align='center' style='width:40%;color:red'>Leave Details</td>
														
												</tr>
												<tr >
														<td align='right' >Employee Name</td>
														<td  >$name</td>
												</tr>
												<tr>
														<td align='right'>Leave Type</td>
														<td>$type</td>
												</tr>
												<tr>
														<td align='right'>From & To Date</td>
														<td>$date to $date2</td>
												</tr>
												<tr>
														<td align='right'>No of Days</td>
														<td>$days</td>
												</tr>
												<tr>
														<td align='right'>Holidays & Leaves</td>
														<td>$holidays_list</td>
												</tr>
												<tr>
														<td align='right'>Reason</td>
														<td>$reason</td>
													<tr>
														<td align='left' colspan='4'> Link:  http://192.168.2.54:8877/LMS/index.php/lms/pending_applications</td>
													
												</tr>
									</table>
							 	  </body></html>";

		$mail->Body =$c;

		//								$mail->Body    = "Leave Type: ".$type."\n No of Day(s): ".$days."\n From: ".$date."\n Reason: ".$reason. ". \n
		//                                                                                               Link:http://192.168.2.54:8877/LMS/index.php/lms/pending_applications";
		//	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo.' File Name: '.$file;
			exit;
		}

		echo 'Message has been sent';

	}



	function remove_tech_info(){
		$form_data = $this->input->post();
		$this->lms_model->remove_tech_info($form_data["team"],$form_data["tech"]);

	}
		
	function update_tech_info(){
		$form_data = $this->input->post();
		$this->lms_model->update_tech_info($form_data["tech"],$form_data["team"],$form_data["name"],$form_data["dept"],$form_data["desig"],$form_data["phone"],$form_data["mail"],$form_data["doj"],$form_data["option"]);

	}

		

	function get_summary(){
		$form_data = $this->input->post();
		$type=$form_data["type"];
		$txt=$form_data["emp"];
		$data["title"]="Leave Summary of ".$txt;
		$data["summary"]=$this->summary_model->get_summary($form_data["year"],$form_data["emp"],$form_data["team"],$form_data["dept"]);
		$data["total"]=$this->summary_model->get_summary_total($form_data["year"],$form_data["emp"],$form_data["team"],$form_data["dept"]);
		$data["perm"]=$this->summary_model->get_admin_permission($form_data["year"],$form_data["emp"]);
		$data["perm_tot"]=$this->summary_model->get_admin_permission_total($form_data["year"],$form_data["emp"]);

		if($type=='1' && $txt!='All Employees'){

			$this->load->view('lms/leave_summary_emp',$data);
		}
		if($type=='1' && $txt=='All Employees'){
			$this->load->view('lms/leave_summary_dept',$data);
		}
		if($type=='2' || $type=='3'){
			$this->load->view('lms/leave_summary_dept',$data);
		}

	}

	
		function get_team_summary(){
		$form_data = $this->input->post();
		$emp=$form_data["emp"];
		$leader=$this->session->userdata("fullname");
		$data["title"]="Leave Summary of ".$emp." of Team - ".$leader;
		$data["summary"]=$this->summary_model->get_team_summary($form_data["year"],$form_data["emp"]);
		$data["total"]=$this->summary_model->get_team_summary_total($form_data["year"],$form_data["emp"]);
		//$data["perm"]=$this->summary_model->get_team_permission($form_data["year"],$form_data["emp"]);
		//$data["perm_tot"]=$this->summary_model->get_team_permission_total($form_data["year"],$form_data["emp"]);

		$this->load->view('lms/leave_summary_dept',$data);
		

	}

	
	
	function get_my_summary(){
		$form_data = $this->input->post();
		$emp=$this->session->userdata("fullname");		
		$data["title"]="Leave Summary of ".$emp." for ".$form_data["year"];
		$data["summary"]=$this->summary_model->get_my_summary($form_data["year"]);
		$data["total"]=$this->summary_model->get_my_summary_total($form_data["year"]);
		$data["perm"]=$this->summary_model->get_my_permission($form_data["year"]);
		$data["perm_tot"]=$this->summary_model->get_my_permission_total($form_data["year"]);
			
		$this->load->view('lms/my_leave_summary_page',$data);
			
	}

	function get_approved_leaves(){
		$form_data = $this->input->post();
		$data["summary"]=$this->lms_model->get_approved_leaves($form_data["year"],$form_data["month"],$form_data["emp"]);
			
		$this->load->view('lms/reprocess_leave_page',$data);
			
	}

	function process_leave(){
		$form_data = $this->input->post();
		$this->lms_model->process_leave($form_data["id"]);
			
	}

	function remove_leave(){
		$form_data = $this->input->post();
		$this->lms_model->remove_leave($form_data["id"]);
			
	}

	function insert_permission_data(){
		$form_data = $this->input->post();
		$this->lms_model->insert_permission_data($form_data["date"],$form_data["hour"],$form_data["total"],$form_data["reason"]);
			
	}

	function check_permission_data(){
		$form_data = $this->input->post();
		echo $this->lms_model->check_permission_data($form_data["date"]);
	}


	function SendPermission(){

		$result = $this->input->post();
		$mail_id = 	$this->lms_model->get_mailID($result["user"]);
		$reason=$result["reason"];
		$date=$result["date"];
		$time=$result["hour"];
		$hrs=$result["total"];
		$name=$result["user"];
			

		foreach($mail_id as $row){
			$to1=$row["md"];
			$from=$row["user"];

		}
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From = $from;
		$mail->FromName = 'Permission Mailer';

		$mail->addAddress($to1);

		$mail->isHTML(true);

		$mail->Subject = $name."  has applied  for Permission.! ";

			
		$c=	"
								<html><body>
									<table border='1' align='center' cellpading='0' cellspacing='0' width='70%' style='color:blue;font-weight:bold;margin: 40px 0px 0px 50px;'>
												<tr >
														<td colspan='2' align='center' style='color:red'>Permission Details</td>
														
												</tr>
												<tr >
														<td align='right' >Employee Name</td>
														<td  >$name</td>
												</tr>
												<tr>
														<td align='right'>Need Hours</td>
														<td>$hrs</td>
												</tr>
												<tr>
														<td align='right'>Date</td>
														<td>$date</td>
												</tr>
													<tr>
														<td align='right'>Time</td>
														<td>$time</td>
												</tr>
											<tr>
														<td align='right'>Reason</td>
														<td>$reason</td>
													<tr>
														<td align='left' colspan='4'> Link:  http://192.168.2.54:8877/LMS/index.php/lms/permissions</td>
													
												</tr>
									</table>
							 	  </body></html>";

		$mail->Body =$c;

		//	$mail->Body    = "Permission for ".$hrs." hours on : ".$date."\n From: ".$time."\n Reason: ".$reason. ". \n
		//                                                                   Link:http://192.168.2.54:8877/LMS/index.php/lms/permissions";
			
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}

		echo 'Message has been sent';

	}

	function grantPermission(){

		$result = $this->input->post();
		$date=$result["date"];
		$remark=$result["remark"];
		$name=$result["user"];

		$this->lms_model->process_permission($result["id"],$result["remark"]);

		$mail_id = 	$this->lms_model->get_mailID($result["user"]);
			

		foreach($mail_id as $row){
			$from=$row["md"];
			$to1=$row["user"];

		}
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From = $from;
		$mail->FromName = 'Permission Mailer';

		$mail->addAddress($to1);

		$mail->isHTML(true);

		$mail->Subject = $name." .! Your Permission on ".$date." was ".$remark;
		$mail->Body    = $name." .! Your Permission on ".$date." was ".$remark." by Managing Director.";
			
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}

		echo 'Message has been sent';

	}


	function getLeave4Date(){
		$form_data = $this->input->post();
		$data["result2"]=$this->lms_model->getLeave4Date($form_data["date1"],$form_data["date2"],$form_data["id1"]);
			
		$this->load->view('lms/LeaveList4date',$data);
			
		 
	}
		
	function getRecentLeave(){
		$form_data = $this->input->post();
		$result=$this->lms_model->getRecentLeave($form_data["user1"],$form_data["id1"]);
			
		foreach($result as $row){
			echo	$date=$row["date"];
		}
			
		if(empty($result)){echo $date='---';}
	}
		

	function SendRemainder(){

		$form_data = $this->input->post();
		$date=$form_data["date_from"];
		$reason=$form_data["reasoning"];
		$days=$form_data["day"];
		$type=$form_data["l_type"];
		$from='info@preipolar.com';
		$to=$form_data["to"];

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'mail.preipolar.com';
		$mail->SMTPAuth = True;
		$mail->Username = 'irshath@preipolar.com';
		$mail->Password = 'prei@123';


		$mail->From = $from;
		$mail->FromName = 'Leave Reminder';
		$mail->addAddress($to);

		$mail->isHTML(true);

		$mail->Subject = "Leave Reminder from ".$this->session->userdata('fullname');;

		$c=	"
								<html><body>
									<table border='1' align='center' cellpading='0' cellspacing='0' width='70%' style='color:blue;font-weight:bold;margin: 40px 0px 0px 50px;'>
												<tr >
														<td colspan='2' align='center' style='color:red'>Leave Details</td>
														
												</tr>
												<tr >
														<td align='right' >Employee Name</td>
														<td  >Gnanajeyam g</td>
												</tr>
												<tr>
														<td align='right'>Leave Type</td>
														<td>$type</td>
												</tr>
												<tr>
														<td align='right'>From Date</td>
														<td>$date</td>
												</tr>
												<tr>
														<td align='right'>No of Days</td>
														<td>$days</td>
												</tr>
												<tr>
														<td align='right'>Reason</td>
														<td>$reason</td>
												</tr>
									</table>
							 	  </body></html>";

		$mail->Body =$c;
			
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}

		echo 'Reminder Mail has been sent';

	}
		
	function getOfficer_L1(){
		$form_data = $this->input->post();
		$result=	$this->lms_model->SendReminder($form_data ["leaveID"]);
		foreach($result as $row){
			echo $row["email"];
		}

	}
		
		
	function update_leave_param(){
		$form_data = $this->input->post();
		$this->lms_model->update_leave_param($form_data["cm"],$form_data["ct"],$form_data["st"],$form_data["sp"],$form_data["pt"],$form_data["pm"],$form_data["pe"],$form_data["comp"],$form_data["permis"],$form_data["carry"],$form_data["paid_prior"]);
	}
		

	function export_leave_history($params){
		//$sdate=document.getElementById("start_date").value;
		$form_data=explode("::", $params);
		$sdate=$form_data[0];
		$edate=$form_data[1];
		$filter=$form_data[2];
		$uname=$this->session->userdata('fullname');
		$data=$this->lms_model->get_leave_status($sdate,$edate,$filter);
		$exporter= new Export_emp_leave_history();
		$exporter->Export($data,$uname);
	}



	function get_holidays_calendar(){
		$form_data = $this->input->post();
		$result=$this->lms_model->get_holidays_calendar($form_data["year1"],$form_data["year2"]);
		foreach($result as $row){
			// $count=$row["count"];
			echo	$date=$row["date"];
			//echo $count.'::'.$date;
		}

	}


	function update_lop(){
		$form_data = $this->input->post();
		$this->lms_model->update_lop($form_data["user"],$form_data["date"],$form_data["days"],$form_data["desc"]);
	}
		

	function get_lop_admin(){
		$form_data = $this->input->post();
		$data["LOP_List"]=$this->lms_model->get_lop_admin($form_data["user"],$form_data["year"]);
		$this->load->view('lms/lop_admin_div',$data);
	}
		

	function remove_lop(){
		$form_data = $this->input->post();
		$this->lms_model->remove_lop($form_data["id"]);
	}
		

	function get_lop_emp(){
		$form_data = $this->input->post();
		$data["title"]="LOP - History of All for ".$form_data["year"];
		$data["LOP_List"]=$this->lms_model->get_lop_emp($form_data["year"]);
		$this->load->view('lms/lop_employee_div',$data);
	}
		
	function get_admin_permission(){
		$form_data = $this->input->post();
		$data["title"]="Permission History of ".$form_data["user"]." for ".$form_data["year"];
		$data["Permission"]=$this->lms_model->get_admin_permission($form_data["user"],$form_data["year"]);
		$this->load->view('lms/admin_permission_div',$data);
	}

	function get_all_permission(){
		$form_data = $this->input->post();
		$data["title"]="Permission History of All for ".$form_data["year"];
		$data["Permission"]=$this->lms_model->admin_permission($form_data["year"]);
		$this->load->view('lms/admin_permission_div',$data);
	}

	function get_my_permission(){
		$form_data = $this->input->post();
		$user=$this->session->data('fullname');
		$data["title"]="Permission History of ".$user." for ".$form_data["year"];
		$data["Permission"]=$this->lms_model->get_my_permission($form_data["year"]);
		$this->load->view('lms/my_permission_div',$data);
	}
		

	function AllEmp_leave_history_dwnld($params){
		$form_data=explode("::", $params);
		$year=$form_data[0];
		$emp=$form_data[1];
		if($emp=='All'){
			$data=$this->lms_model->admin_leavehistory_approved_all($year);
				
			$exporter= new AllEmp_leave_history_dwnld();
			$exporter->Export($data);
		}
		else{
			//$data["result"]=$this->lms_model->admin_leavehistory_approved_ind($form_data["year"],$form_data["emp"]);
			//$this->load->view('lms/admin_leavehistory_page_all',$data);
			//$this->load->view('lms/admin_leavehistory_approved_ind_print',$data);
		}

	}


}
?>