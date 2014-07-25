<?php
class timesheet extends CI_Controller
{

	function __construct()
	{
			
		parent::__construct();
		$this->load->model('ts_model');
		$this->load->model('otsummary_model');
		$this->load->helper('url');
		$this->load->library('AllEmp_ot_dwnld');
		$this->load->library('AllEmp_unupdated_dwnld');
		$this->load->library('AllMon_Emp_unupdated_dwnld');
		$this->load->library('singleMon_Emp_unupdated_dwnld');
		if(!$this->session->userdata('admin_logged_in'))
		{
			redirect("logincheck");
		}

	}

	function index()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='entry';
		$data["activity"]=$this->ts_model->get_activity_code();
		$data["job"]=$this->ts_model->get_jobs();
		$data["np"]=$this->ts_model->get_np_jobs();
		$this->template->write('titleText', "Time Sheet  Entry");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/timesheet_entry',$data);
		$this->template->render();
	}

	function intro()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='tms_intro';
		$data["activity"]=$this->ts_model->get_activity_code();
		$data["job"]=$this->ts_model->get_jobs();
		$data["np"]=$this->ts_model->get_np_jobs();
		$this->template->write('titleText', "Time Sheet  Entry");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/tms_intro',$data);
		$this->template->render();
	}

	function intro_admin()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='tms_intro';
		$data["activity"]=$this->ts_model->get_activity_code();
		$data["job"]=$this->ts_model->get_jobs();
		$data["np"]=$this->ts_model->get_np_jobs();
		$this->template->write('titleText', "Time Sheet  Entry");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/tms_intro',$data);
		$this->template->render();
	}

	function teamsheet()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='teamsheet';
		$data["deptlist"]=$this->ts_model->get_dept();
		$data["members"]=$this->ts_model->get_all_members();
		$data["Year"]=$this->ts_model->get_All_Years();
		$data["Jobs_Num"]=$this->ts_model->get_All_JobsNum();
		$this->template->write('titleText', "Employees Time Sheet Reports");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/teamsheet',$data);
		$this->template->render();
	}
	
	function timesheet_jobwise()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='timesheet_jobwise';
		$data["deptlist"]=$this->ts_model->get_dept();
		$data["members"]=$this->ts_model->get_all_members();
		$data["Year"]=$this->ts_model->get_All_Years();
		$data["Jobs_Num"]=$this->ts_model->get_All_JobsNum();
		$this->template->write('titleText', "Jobwise Time Sheet Reports");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/timesheet_jobwise',$data);
		$this->template->render();
	}
	
	function teamsheet_dept()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='teamsheet_dept';
		$data["Year"]=$this->ts_model->get_MyYears();
		$data["Jobs_Num"]=$this->ts_model->get_My_JobsNum();
		$data["deptlist"]=$this->ts_model->get_dept();
		$data["teamlist"]=$this->ts_model->get_team();
		$data["members"]=$this->ts_model->get_all_members();
		$this->template->write('titleText', "Extensive Time Sheet Reports");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/teamsheet_dept',$data);
		$this->template->render();
	}
		
	function teamsheet_leader()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='teamsheet_leader';
		$data["members"]=$this->ts_model->get_team_members();
		$this->template->write('titleText', "My Team Time Sheet");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/teamsheet_leader',$data);
		$this->template->render();
	}
		
	function my_ot()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='my_ot';
		$data['years']=$this->ts_model->get_years();
		$this->template->write('titleText', "My  OT Details");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/my_ot',$data);
		$this->template->render();
	}
		
	function my_otsummary()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='my_otsummary';
		$data["members"]=$this->ts_model->get_leave_members();
		$data["dept"]=$this->ts_model->get_deptartments();
		$data['years']=$this->ts_model->get_years();
		$this->template->write('titleText', "My OT Summary");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/my_otsummary',$data);
		$this->template->render();
	}
		
	function my_ack_otsummary()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='my_ack_otsummary';
		$data['years']=$this->ts_model->get_years();
		$this->template->write('titleText', "My OT Summary");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/acknowledged_ot_emp_main',$data);
		$this->template->render();
	}
		
		
	function admin_ot()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='admin_ot';
		$data["members"]=$this->ts_model->get_leave_members();
		$data['years']=$this->ts_model->get_years();
		$this->template->write('titleText', "Employees  OT Details");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/admin_ot',$data);
		$this->template->render();
	}
		
	function admin_otsummary()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='admin_otsummary';
		$data["members"]=$this->ts_model->get_leave_members();
		$data["dept"]=$this->ts_model->get_deptartments();
		$data['years']=$this->ts_model->get_years();
		$this->template->write('titleText', "Employees  OT Summary");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/admin_otsummary',$data);
		$this->template->render();
	}
		
	function ack_ot_history()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='ack_ot_history';
		$data["members"]=$this->ts_model->get_ack_members();
		$data["dept"]=$this->ts_model->get_deptartments();
		$data['years']=$this->ts_model->get_years();
		$this->template->write('titleText', "Acknowledged OTs");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/acknowledged_ot_history',$data);
		$this->template->render();
	}
		
		
	function mysheet()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='mysheet';
		$data["Year"]=$this->ts_model->get_MyYears();
		$this->template->write('titleText', "My  Time Sheet");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/mysheet',$data);
		$this->template->render();
	}
		
	function edit_timesheet()
	{
		$data["menu"]='timesheet';
		$data["submenu"]='edit_timesheet';
		$data["param"]=$this->ts_model->get_parameters();
		$this->template->write('titleText', "Edit  Time Sheet");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/edit_timesheet',$data);
		$this->template->render();
	}
		
		
	function set_inout_time()
	{
		$data["menu"]='misc';
		$data["submenu"]='set_inout_time';
		$this->template->write('titleText', "Set In-Out Time");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/set_inout_time',$data);
		$this->template->render();
	}
		
		
		
		
	function addjobs()
	{
		$data["menu"]='misc';
		$data["submenu"]='addjobs';
		$data["jobs"]=$this->ts_model->get_all_jobs();
		$data["npjobs"]=$this->ts_model->get_all_npjobs();
		$this->template->write('titleText', "	Manage Jobs");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/addjobs',$data);
		$this->template->render();
	}

		
	function insert_timesheet_data(){

		$result= $this->input->post();
		$this->ts_model->insert_timesheet_data($result["date"],$result["in"],$result["out"],$result["late"],$result["lunch"],$result["duty"],$result["ot"],$result["tot"],$result["jd1"],$result["Hr1"],$result["jd2"],$result["Hr2"],$result["jd3"],$result["Hr3"],$result["jd4"],$result["Hr4"],$result["jd5"],$result["Hr5"],$result["jd6"],$result["Hr6"],$result["jd7"],$result["Hr7"],$result["np1"],$result["atv1"],$result["desc1"],$result["np2"],$result["atv2"],$result["desc2"],$result["np3"],$result["atv3"],$result["desc3"],$result["np4"],$result["atv4"],$result["desc4"],$result["np5"],$result["atv5"],$result["desc5"],$result["np6"],$result["atv6"],$result["desc6"],$result["np7"],$result["atv7"],$result["desc7"]);
		//echo $result["date"];
	}
		
		
	function process_jobs(){
		$result= $this->input->post();
		$this->ts_model->process_jobs($result["value"],$result["num"]);
			
	}
		
	function process_npjobs(){
		$result= $this->input->post();
		$this->ts_model->process_npjobs($result["value"],$result["num"]);
			
	}

	function add_jobs(){
		$result= $this->input->post();
		$this->ts_model->add_jobs($result["num"],$result["desc"],$result["type"]);
			
	}
		
	function update_jobs(){
		$result= $this->input->post();
		$this->ts_model->update_jobs($result["num"],$result["desc"],$result["type"],$result["id"]);
			
	}
		
		

		
	function get_timesheet_overall(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_timesheet_overall($result["year"],$result["month"]);
		$data["tothrs"]=$this->ts_model->get_timesheet_overall_hrs($result["year"],$result["month"]);
		$this->load->view('timesheet/teamsheet_overall_general',$data);
	}
		
	function get_timesheet_jobwise(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_timesheet_jobwise($result["year"],$result["month"],$result["num"]);
		$data["tothrs"]=$this->ts_model->get_timesheet_jobwise_hrs($result["year"],$result["month"],$result["num"]);
		$this->load->view('timesheet/teamsheet_jobwise_div',$data);
	}

	function get_timesheet_userwise(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_timesheet_userwise($result["year"],$result["month"],$result["user"]);
		$data["tothrs"]=$this->ts_model->get_timesheet_userwise_hrs($result["year"],$result["month"],$result["user"]);
		$this->load->view('timesheet/teamsheet_userwise',$data);
	}

	function get_timesheet_ot(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_timesheet_ot($result["year"],$result["month"]);
		$data["tothrs"]=$this->ts_model->get_timesheet_ot_hrs($result["year"],$result["month"]);
		$this->load->view('timesheet/teamsheet_ot',$data);
	}

		
		
	function timesheet_activity_emp(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->timesheet_activity_emp($result["year"],$result["month"],$result["user"]);
		$data["tothrs"]=$this->ts_model->timesheet_activity_emp_hrs($result["year"],$result["month"],$result["user"]);
		$data["leaves"]=$this->ts_model->showLeaves_emp($result["year"],$result["month"],$result["user"]);
		$this->load->view('timesheet/timesheet_activity_emp',$data);
	}
		
		
		
	function user_timesheet_overall(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->user_timesheet_overall($result["year"],$result["month"]);
		$data["tothrs"]=$this->ts_model->user_timesheet_overall_hrs($result["year"],$result["month"]);
		$this->load->view('timesheet/teamsheet_overall_general',$data);
	}

	function user_timesheet_jobwise(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->user_timesheet_jobwise($result["year"],$result["month"],$result["num"]);
		$data["tothrs"]=$this->ts_model->user_timesheet_jobwise_hrs($result["year"],$result["month"],$result["num"]);
		$this->load->view('timesheet/teamsheet_jobwise_user',$data);
	}
		
	function timesheet_activity_user(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->timesheet_activity_user($result["year"],$result["month"]);
		$data["tothrs"]=$this->ts_model->timesheet_activity_user_hrs($result["year"],$result["month"]);
		$data["leaves"]=$this->ts_model->showLeaves_user($result["year"],$result["month"]);
		$this->load->view('timesheet/timesheet_activity_user',$data);
	}

		
		
		
		
		
	function team_timesheet_overall(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->team_timesheet_overall($result["year"],$result["month"]);
		$data["tothrs"]=$this->ts_model->team_timesheet_overall_hrs($result["year"],$result["month"]);
		$this->load->view('timesheet/teamsheet_overall',$data);
	}
		
	function team_timesheet_jobwise(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->team_timesheet_jobwise($result["year"],$result["month"],$result["num"]);
		$data["tothrs"]=$this->ts_model->team_timesheet_jobwise_hrs($result["year"],$result["month"],$result["num"]);
		$this->load->view('timesheet/teamsheet_jobwise_div',$data);
	}

	function team_timesheet_ot(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->team_timesheet_ot($result["year"],$result["month"]);
		$data["tothrs"]=$this->ts_model->team_timesheet_ot_hrs($result["year"],$result["month"]);
		$this->load->view('timesheet/teamsheet_ot',$data);
	}

		
	function get_timedate(){
		$result= $this->input->post();
		$data["timing"]=$this->ts_model->get_timedate($result["date"]);
		$this->load->view('timesheet/edit_timesheet_div',$data);
	}
		
		
	function update_changes(){
		$result= $this->input->post();
		$this->ts_model->update_changes($result["id"],$result["in"],$result["out"],$result["late"],$result["ot"],$result["duty"],$result["tot"],$result["lunch"]);
	}
		
	function checkDate(){
		$result= $this->input->post();
		echo $this->ts_model->checkDate($result["d1"]);
	}
	function checkLeave(){
		$result= $this->input->post();
		echo $this->ts_model->checkLeave($result["d1"]);
	}

	function checkLocked(){
		$result= $this->input->post();
		echo $this->ts_model->checkLocked($result["d1"]);
	}

	function get_INOUT(){
		$result= $this->input->post();
		$date1=$result["d1"];
		$date=date('Y-m-d', strtotime($date1));
		$col=$this->ts_model->get_INOUT($date);
		echo $col;
	}

		

	function get_timesheet_Dept(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_timesheet_Dept($result["year"],$result["month"],$result["dept"]);
		$data["tothrs"]=$this->ts_model->get_timesheet_Dept_hrs($result["year"],$result["month"],$result["dept"]);
		$this->load->view('timesheet/teamsheet_overall',$data);
	}
		
	function get_timesheet_Team(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_timesheet_Team($result["year"],$result["month"],$result["team"]);
		$data["tothrs"]=$this->ts_model->get_timesheet_Team_hrs($result["year"],$result["month"],$result["team"]);
		$this->load->view('timesheet/teamsheet_overall',$data);
	}
		
	function timesheet_team_job(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->timesheet_team_job($result["year"],$result["month"],$result["job"],$result["team"]);
		$data["tothrs"]=$this->ts_model->timesheet_team_job_hrs($result["year"],$result["month"],$result["job"],$result["team"]);
		$this->load->view('timesheet/teamsheet_jobwise_div',$data);
	}
		
		
	function get_my_ot(){
		$result= $this->input->post();
		$data["ot"]=$this->ts_model->get_my_normal_ot($result["year"],$result["month"]);
		$data["holi"]=$this->ts_model->get_my_holiday_ot($result["year"],$result["month"]);
		$data["ot_tot"]=$this->ts_model->get_my_normal_ot_hrs($result["year"],$result["month"]);
		$data["holi_tot"]=$this->ts_model->get_my_holiday_ot_hrs($result["year"],$result["month"]);
		$data["Comp_Off"]=$this->otsummary_model->get_my_CompOff($result["year"],$result["month"]);
		$this->load->view('timesheet/my_ot_page',$data);

	}
		
	function get_admin_ot(){
		$result= $this->input->post();
		$data["ot"]=$this->ts_model->get_admin_normal_ot($result["year"],$result["month"],$result["emp"]);
		$data["holi"]=$this->ts_model->get_admin_holiday_ot($result["year"],$result["month"],$result["emp"]);
		$data["ot_tot"]=$this->ts_model->get_admin_normal_ot_hrs($result["year"],$result["month"],$result["emp"]);
		$data["holi_tot"]=$this->ts_model->get_admin_holiday_ot_hrs($result["year"],$result["month"],$result["emp"]);
		$data["Comp_Off"]=$this->otsummary_model->get_CompOff_Admin($result["year"],$result["month"],$result["emp"]);
		$this->load->view('timesheet/admin_ot_page',$data);

	}
		
	function update_timeoffice(){
		$result= $this->input->post();
		echo		$this->ts_model->update_timeoffice($result["id1"],$result["d1"],$result["d2"],$result["in1"],$result["out1"]);
	}
		
	function get_timeofficeID(){
		$result=$this->input->post();
		$data["result1"]=$this->ts_model->get_timeofficeID($result["date"]);
		$this->load->view('timesheet/set_inout_time_div',$data);
	}





	function timesheet_job_activity_user(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->timesheet_job_activity_user($result["year"],$result["month"]);
		$data["tothrs"]=$this->ts_model->timesheet_job_activity_user_hrs($result["year"],$result["month"]);
		$data["leaves"]=$this->ts_model->showLeaves_user($result["year"],$result["month"]);
		$this->load->view('timesheet/timesheet_job_activity_user',$data);
	}

	function timesheet_job_activity_emp(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->timesheet_job_activity_emp($result["year"],$result["month"],$result["user"]);
		$data["tothrs"]=$this->ts_model->timesheet_job_activity_emp_hrs($result["year"],$result["month"],$result["user"]);
		$data["leaves"]=$this->ts_model->showLeaves_emp($result["year"],$result["month"],$result["user"]);
		$this->load->view('timesheet/timesheet_job_activity_emp',$data);
	}
		
	function check_job(){
		$result= $this->input->post();
		echo  $this->ts_model->check_job($result["job"]);
	}
	function fetch_job(){
		$result= $this->input->post();
		echo  $this->ts_model->fetch_job($result["job"]);
	}

	function check_npjob(){
		$result= $this->input->post();
		echo	$this->ts_model->check_npjob($result["job"]);

	}

	function locked_users_md()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='locked_users';
		//	$data["members"]=$this->ts_model->get_team_members();
		$data["members"]=$this->ts_model->get_leave_members();
		$data['years']=$this->ts_model->get_lockedyears();
		$this->template->write('titleText', "Time Sheet Locked Users");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/locked_users',$data);
		$this->template->render();
	}
		
	function not_timesheet_updated()
	{
		$data["menu"]='e_reports';
		$data["submenu"]='not_updated';
		$data["deptlist"]=$this->ts_model->get_dept();
		$data["members"]=$this->ts_model->get_leave_members();
		$data['years']=$this->ts_model->get_lockedyears();
		$this->template->write('titleText', "Time Sheet Locked Users");
		$this->template->write_view('sideLinks', 'general/menu',$data);
		$this->template->write_view('bodyContent', 'timesheet/timesheet_not_updated',$data);
		$this->template->render();
	}
		
		
	function get_locked_users(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_locked_users($result["year"],$result["month"]);
		$this->load->view('timesheet/locked_users_page',$data);

	}
	function get_locked_user(){
		$result= $this->input->post();
		$data["history"]=$this->ts_model->get_locked_user($result["year"],$result["month"],$result["emp"]);
		$this->load->view('timesheet/locked_users_page',$data);

	}
		
	function unlock_timesheet(){
		$result= $this->input->post();
		$this->ts_model->unlock_timesheet($result["id"]);
	}



	function get_admin_otsummary(){
		$result= $this->input->post();
		if($result["emp"] == "AllEmp")
		{
				
			$data["members"]=$this->ts_model->get_leave_members();
			$data["startdate"]=$result["d1"];
			$data["enddate"]=$result["d2"];
			$this->load->view('timesheet/AllEmp_otsummary_page',$data);
		}else
		{
			$data["ot"]=$this->otsummary_model->get_admin_normal_ot($result["year"],$result["month"],$result["emp"]);
			$data["timeoffice"]=$this->otsummary_model->get_days($result["year"],$result["month"],$result["emp"]);
			$data["Comp_Off"]=$this->otsummary_model->get_CompOff_Hours($result["year"],$result["month"],$result["emp"]);
			$data["permission"]=$this->otsummary_model->get_Permission_Hours($result["year"],$result["month"],$result["emp"]);
			$this->load->view('timesheet/admin_otsummary_page',$data);
		}

	}
		
	function admin_ot_dept(){
		$result= $this->input->post();
		//echo $result["d1"].$result["d2"].$result["dept"];
		//		$a="2014-03-01";
		//		$b="2014-03-31";
		//		$c="ENGINEERING";
		$data["dept_work_details"]=$this->otsummary_model->dept_work_details($result["year"],$result["month"],$result["dept"]);
		$data["from"]=$result["d1"];
		$data["to"]=$result["d2"];
		$this->load->view('timesheet/admin_ot_dept_page',$data);
			
	}
		
		
	function acknowledge_OT(){
		$result= $this->input->post();
		$this->otsummary_model->acknowledge_OT($result["user"],$result["year"],$result["month"],$result["ot_hrs"],$result["amount"]);
	}
		
	function check_acknowledged(){
		$result= $this->input->post();
		$solution=$this->otsummary_model->check_acknowledged($result["user"],$result["year"],$result["month"]);

		foreach($solution as $row){
			$count=$row["count"];
			$from=$row["FromMonth"];
			$to=$row["ToMonth"];
			$output=$count.'::'.$from.'::'.$to;
		}
		echo $output;
	}
		
		
	function ack_history_emp(){
		$result= $this->input->post();
		$data["history"]=$this->otsummary_model->ack_history_emp($result["user"],$result["year"]);
		$this->load->view('timesheet/acknowledged_ot_history_page',$data);
	}
		
	function ack_history_for_emp(){
		$result= $this->input->post();
		$data["history"]=$this->otsummary_model->ack_history_for_emp($result["year"]);
		$this->load->view('timesheet/acknowledged_ot_history_emp',$data);
	}
		
		
	function ack_history_dept(){
		$result= $this->input->post();
		$data["history"]=$this->otsummary_model->ack_history_dept($result["dept"],$result["year"],$result["month"]);
		$this->load->view('timesheet/acknowledged_ot_history_dept',$data);
	}
		
		
	function cancel_Acknowledged(){
		$result= $this->input->post();
		$data["history"]=$this->otsummary_model->cancel_Acknowledged($result["id"]);
	}
		
	function getAllUsers(){
		$result= $this->input->post();
		$data["allUsers"]=$this->ts_model->getAllUsers($result["year"],$result["month"],$result["dept"]);
		$this->load->view('timesheet/timesheet_not_updated_page',$data);
	}
		
	function get_not_updatedUsers(){
		$result= $this->input->post();
		$data["members"]=$this->ts_model->get_leave_members();
		$data["month"]=$result["month"];
		$user=$result["user"];
		if($user == "AllEmp")
		{
			//$data["allUsers"]=$this->ts_model->getAllUsers($result["year"],$result["month"],$result["dept"]);
			$this->load->view('timesheet/timesheet_not_updated_page_AllEmp',$data);
		}else
		{
			//echo $user;
			if ($result["month"] == "AllMon")
			{
				$data["user"]=$user;
				$data["ind_month"]=$this->ts_model->fetch_individual_month($user,$result["year"]);
				$this->load->view('timesheet/timesheet_not_updated_page_AllMon',$data);
			}
			else
			{
				$data["user"]=$user;
				$data["ind_details"]=$this->ts_model->fetch_individual_details($user,$result["month"]);
				$this->load->view('timesheet/timesheet_not_updated_page_single_month',$data);
			}

				
		}
	}

	function AllEmp_ot_dwnld($params){
		//$sdate=document.getElementById("start_date").value;
		$form_data=explode("::", $params);
			
		$user=$form_data[2];
			
		if($user == "AllEmp")
		{
				
			$data=$this->ts_model->get_leave_members();
				
			$exporter= new AllEmp_ot_dwnld();
			$exporter->Export($data,$params);
				
		}else
		{
			echo "You can download the Excel for all employess only";
		}
			
	}
		
	function AllEmp_unupdated_dwnld($params){
		$form_data=explode("::", $params);

		$user=$form_data[2];
		if($user == "AllEmp")
		{
			//$data["allUsers"]=$this->ts_model->getAllUsers($result["year"],$result["month"],$result["dept"]);
				
			$data=$this->ts_model->get_leave_members();
			$exporter= new AllEmp_unupdated_dwnld();
			$exporter->Export($data,$form_data[1]);

		}else
		{
			//echo $user;
			if ($form_data[1] == "AllMon")
			{
				$name=str_replace("%20","_",$form_data[2]);
				$data=$this->ts_model->fetch_individual_month($name,$form_data[0]);
				$exporter= new AllMon_Emp_unupdated_dwnld();
				$exporter->Export($data,$params);
			}
			else
			{
				$name=str_replace("%20","_",$form_data[2]);
				$data=$this->ts_model->fetch_individual_details($name,$form_data[1]);
				$exporter= new singleMon_Emp_unupdated_dwnld();
				$exporter->Export($data,$params);
			}

				
		}
	}

	
	
	
	// July 23, 2014
	
		function timesheet_jobReport(){
			$form_data=$this->input->post();
			$job_num=$form_data["job_num"];
			$data['Job_Activty']=$this->ts_model->jobReport_JobActivity($job_num);
			$data['Empwise_Total']=$this->ts_model->jobReport_EmpwiseTotal($job_num);
			$data['Activitywise_Total']=$this->ts_model->jobReport_ActivitywiseTotal($job_num);
			$data['Deptwise_Total']=$this->ts_model->jobReport_DeptwiseTotal($job_num);
			$data['Relativewise_Total']=$this->ts_model->jobReport_RelativewiseTotal($job_num);
			$data['Total_Hrs']=$this->ts_model->jobReport_TotalHrs($job_num);
			$data['Job_Number']=$job_num;
			$data['Job_Desc']=$this->ts_model->get_JobDesc($job_num);
			
			$this->load->view("timesheet/timesheet_jobwise_content",$data);
			
		}
	
	
		function timesheet_jobReport_Week(){
			$form_data=$this->input->post();
			$job_num=$form_data["job_num"];
			$from=date('Y-m-d', strtotime($form_data["from"]));
			$to=date('Y-m-d', strtotime($form_data["to"]));
			$data['Job_Activty']=$this->ts_model->jobReport_JobActivity_Week($from,$to,$job_num);
			$data['Empwise_Total']=$this->ts_model->jobReport_EmpwiseTotal_Week($from,$to,$job_num);
			$data['Activitywise_Total']=$this->ts_model->jobReport_ActivitywiseTotal_Week($from,$to,$job_num);
			$data['Deptwise_Total']=$this->ts_model->jobReport_DeptwiseTotal_Week($from,$to,$job_num);
			$data['Relativewise_Total']=$this->ts_model->jobReport_RelativewiseTotal_Week($from,$to,$job_num);
			$data['Total_Hrs']=$this->ts_model->jobReport_TotalHrs_Week($from,$to,$job_num);
			$data['Job_Number']=$job_num;
			$data['Job_Desc']=$this->ts_model->get_JobDesc($job_num);
			
			$this->load->view("timesheet/timesheet_jobwise_content",$data);
			
		}
	
		
	
	
}

?>