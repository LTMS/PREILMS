<?php
Class General_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
	}


	function get_parameters()
	{
		return $this->db->query("SELECT * FROM parameters ")->result_array();

	}

	function update_param($in,$out,$tot,$ot,$lunch,$sick_limit,$permiss,$comp){
		$uname=$this->session->userdata('fullname');
		$this->db->query("UPDATE parameters SET in_time='$in', out_time='$out', duty_hrs='$tot', updatedby='$uname', min_OT='$ot',lunch='$lunch', sick_limit='$sick_limit', permission_hrs='$permiss',comp_off_reduct='$comp', updatedon=CURRENT_TIMESTAMP WHERE id_param='1' ");
	}



	function get_mydetails(){
		$uname=$this->session->userdata('fullname');
		return $this->db->query("SELECT a.*, b.* FROM team a INNER JOIN admin_users b ON b.name=a.EmployeeName  WHERE a.EmployeeName='$uname'")->result_array();
	}

	function get_teamdetails(){
		$uname=$this->session->userdata('fullname');
		return $this->db->query("SELECT a.*, b.* FROM team a INNER JOIN admin_users b ON b.user_email=a.EmployeeName  WHERE a.LeaveApprover_L1='$uname'")->result_array();
	}

	function get_userdetails(){
		$uname=$this->session->userdata('fullname');
		return $this->db->query("SELECT a.*, b.* FROM team a INNER JOIN admin_users b ON b.user_email=a.EmployeeName")->result_array();
	}

	function show_holidays($year){
		return $this->db->query("SELECT holiday_id, holi_date,holi_desc,addedby FROM holidays WHERE YEAR(holi_date) ='$year' ORDER BY holi_date ")->result();
			
	}

	function get_years(){
		return $this->db->query("SELECT  DISTINCT YEAR(holi_date) AS 'year' FROM holidays ORDER BY YEAR(holi_date)  ")->result_array();
	}



	function add_holiday($desc,$date){
		$uname=$this->session->userdata('fullname');
		$desc1=addslashes($desc);
		$this->db->query("INSERT INTO holidays(holi_date,holi_desc,addedby) VALUES(STR_TO_DATE(STR_TO_DATE('$date','%d-%m-%Y'),'%Y-%m-%d'),\"$desc1\",'$uname')");
	}

	function remove_holiday($id){
		$this->db->query("DELETE FROM holidays WHERE holiday_id='$id'");
	}

	function getUserMail(){
		$uname=$this->session->userdata('fullname');
		return	$this->db->query("SELECT email FROM admin_users WHERE name='$uname' LIMIT 1")->result_array();
	}

	function getFileName($file){
		return	$this->db->query("SELECT '$file' as filename FROM team ")->result_array();
	}
	function fetch_job_details()
	{
		
		$query=$this->db->query("SELECT *
											FROM jobs j
											GROUP BY job_no
											ORDER BY job_no;");
	
		return $query;
	}	
	function Update_job($job_no,$hours)
	{
		$Target_Hours=$hours;
		$Job_No=$job_no;
		$Emp_Name=$this->session->userdata("fullname");
		$updated_Date=date("Y-m-d H:i:s");
		$this->db->query("Update jobs
											SET target_hours ='$Target_Hours',
											    updated_time ='$updated_Date',
											    updated_by='$Emp_Name',
											    hours_updated=hours_updated+1
											where job_no ='$Job_No' ");
		$row_count=$this->db->affected_rows();
		if($row_count != 0)
		{
			return "ok";
		}
	}
	function fetch_job_emp($job_no)
	{
		$Emp_Name="";
		$result=$this->db->query("SELECT name FROM jobs j
															where job_no ='$job_no' ;")->result_array();
		foreach($result as $row)
		{
			$Emp_Name=$Emp_Name."!".$row['name'];
		}
		return $Emp_Name;
	}
	function fetch_actual_hours($job_no)
	{
		$actual=$this->db->query("SELECT SUM(HOUR(job_time))+HOUR(SEC_TO_TIME(SUM(MINUTE(job_time)*60)))+IF(MINUTE(SEC_TO_TIME(SUM(MINUTE(job_time)*60)))>29,1,0) as  total
 											 FROM time_sheet_jobs t WHERE job_no='$job_no';")->result_array();
		return $actual;
	}
	function fetch_prev_targets($job_no)
	{
		$result=$this->db->query("SELECT distinct target_hours FROM lms.target_hours t where job_no ='$job_no'  ORDER BY updated_time desc LIMIT 3;")->result_array();
		$target_hours="";
		foreach($result as $row)
		{
		if($target_hours== "")
		{
		$target_hours=$row['target_hours'];
		}else 
		{
		$target_hours=$target_hours.",".$row['target_hours'];
		}
		}
		return $target_hours;
	}
}
?>