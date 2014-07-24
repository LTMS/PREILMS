<?php
Class Summary_model extends CI_Model{
	function _construct()
	{
		parent::_construct();
	}


	function get_summary($year,$emp,$team,$dept){
			
			
		if($emp!='All Employees'){
			return $this->db->query("SELECT  User,monthname(str_to_date(month,'%c')) AS 'MonthName',SUM(CasualLeave) AS 'CL',SUM(PaidLeave) AS 'PL', SUM(SickLeave) AS 'SL',
																				SUM(Comp_Off) AS 'CO'
																				FROM(
																								SELECT User,SUBSTRING(FromDate,6,2) AS 'Month',IF(LeaveType='Casual Leave',TotalDays, 0) as 'CasualLeave',
																								IF(LeaveType='Paid Leave',TotalDays, 0) as 'PaidLeave',
																								IF(LeaveType='Sick Leave',TotalDays, 0) as 'SickLeave',
																								IF(LeaveType='Comp-Off',TotalDays, 0) as 'Comp_Off' 
																								FROM leavehistory INNER JOIN team b ON b.EmployeeName=User
																								WHERE LeaveStatus IN ('2','4') AND SUBSTRING(FromDate,1,4)='$year' AND (User='$emp' OR b.Department='$dept' OR LeaveApprover_L1='$team')
																				) A
																				Group By User,Month")->result_array();
				
		}
		if($emp=='All Employees'){
			return $this->db->query("SELECT  User,monthname(str_to_date(month,'%c')) AS 'MonthName',SUM(CasualLeave) AS 'CL',SUM(PaidLeave) AS 'PL', SUM(SickLeave) AS 'SL',
																				SUM(Comp_Off) AS 'CO'
																				FROM(
																								SELECT User,SUBSTRING(FromDate,6,2) AS 'Month',IF(LeaveType='Casual Leave',TotalDays, 0) as 'CasualLeave',
																								IF(LeaveType='Paid Leave',TotalDays, 0) as 'PaidLeave',
																								IF(LeaveType='Sick Leave',TotalDays, 0) as 'SickLeave',
																								IF(LeaveType='Comp-Off',TotalDays, 0) as 'Comp_Off' 
																								FROM leavehistory INNER JOIN team b ON b.EmployeeName=User
																								WHERE LeaveStatus IN ('2','4') AND SUBSTRING(FromDate,1,4)='$year'
																				) A
																				Group By User,Month")->result_array();
		}

	}
		
	function get_summary_total($year,$emp,$team,$dept){
			
			
		if($emp!='All Employees'){
			return $this->db->query("SELECT SUM(CasualLeave) AS 'CL',SUM(PaidLeave) AS 'PL', SUM(SickLeave) AS 'SL',
																				SUM(Comp_Off) AS 'CO'
																				FROM(
																								SELECT User,SUBSTRING(FromDate,6,2) AS 'Month',IF(LeaveType='Casual Leave',TotalDays, 0) as 'CasualLeave',
																								IF(LeaveType='Paid Leave',TotalDays, 0) as 'PaidLeave',
																								IF(LeaveType='Sick Leave',TotalDays, 0) as 'SickLeave',
																								IF(LeaveType='Comp-Off',TotalDays, 0) as 'Comp_Off' 
																								FROM leavehistory INNER JOIN team b ON b.EmployeeName=User
																								WHERE LeaveStatus IN ('2','4') AND SUBSTRING(FromDate,1,4)='$year' AND (User='$emp' OR b.Department='$dept' OR LeaveApprover_L1='$team')
																				) A ")->result_array();
				
		}
		if($emp=='All Employees'){
			return $this->db->query("SELECT  SUM(CasualLeave) AS 'CL',SUM(PaidLeave) AS 'PL', SUM(SickLeave) AS 'SL',
																				SUM(Comp_Off) AS 'CO'
																				FROM(
																								SELECT User,SUBSTRING(FromDate,6,2) AS 'Month',IF(LeaveType='Casual Leave',TotalDays, 0) as 'CasualLeave',
																								IF(LeaveType='Paid Leave',TotalDays, 0) as 'PaidLeave',
																								IF(LeaveType='Sick Leave',TotalDays, 0) as 'SickLeave',
																								IF(LeaveType='Comp-Off',TotalDays, 0) as 'Comp_Off' 
																								FROM leavehistory INNER JOIN team b ON b.EmployeeName=User
																								WHERE LeaveStatus IN ('2','4') AND SUBSTRING(FromDate,1,4)='$year'
																				) A ")->result_array();
		}

	}
		
		
	function get_my_summary($year){
		$uname=$this->session->userdata('fullname');
		return $this->db->query("SELECT  monthname(str_to_date(month,'%c')) AS 'MonthName',SUM(CasualLeave) AS 'CL',SUM(PaidLeave) AS 'PL', SUM(SickLeave) AS 'SL',
																				SUM(Comp_Off) AS 'CO'
																				FROM(
																								SELECT User,SUBSTRING(FromDate,6,2) AS 'Month',IF(LeaveType='Casual Leave',TotalDays, 0) as 'CasualLeave',
																								IF(LeaveType='Paid Leave',TotalDays, 0) as 'PaidLeave',
																								IF(LeaveType='Sick Leave',TotalDays, 0) as 'SickLeave',
																								IF(LeaveType='Comp-Off',TotalDays, 0) as 'Comp_Off' 
																								FROM leavehistory INNER JOIN team b ON b.EmployeeName=User
																								WHERE LeaveStatus IN ('2','4') AND SUBSTRING(FromDate,1,4)='$year' AND User='$uname' 
																				) A
																				Group By Month")->result_array();
			
	}

	function get_my_summary_total($year){
		$uname=$this->session->userdata('fullname');
		return $this->db->query("SELECT  SUM(CasualLeave) AS 'CL',SUM(PaidLeave) AS 'PL', SUM(SickLeave) AS 'SL',
																				SUM(Comp_Off) AS 'CO'
																				FROM(
																								SELECT User,SUBSTRING(FromDate,6,2) AS 'Month',IF(LeaveType='Casual Leave',TotalDays, 0) as 'CasualLeave',
																								IF(LeaveType='Paid Leave',TotalDays, 0) as 'PaidLeave',
																								IF(LeaveType='Sick Leave',TotalDays, 0) as 'SickLeave',
																								IF(LeaveType='Comp-Off',TotalDays, 0) as 'Comp_Off' 
																								FROM leavehistory INNER JOIN team b ON b.EmployeeName=User
																								WHERE LeaveStatus IN ('2','4') AND SUBSTRING(FromDate,1,4)='$year' AND User='$uname' 
																				) A		")->result_array();
			
	}




	function get_my_permission($y){
		$user=$this->session->userdata('fullname');
		return	$this->db->query("SELECT MONTHName(p_date) as month, totalhrs, DAY(p_date) as day,reason,timefrom FROM permissions WHERE  user='$user' AND YEAR(p_date)='$y'  AND status='Approved' ")->result_array();
	}

	function get_my_permission_total($y){
		$user=$this->session->userdata('fullname');
		return	$this->db->query("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(totalhrs))) as totalhrs FROM permissions WHERE  user='$user' AND YEAR(p_date)='$y'  AND status='Approved' ")->result_array();
	}
		
	function get_admin_permission($y,$user){
		return	$this->db->query("SELECT MONTHName(p_date) as month, totalhrs,DAY(p_date) as day,reason,timefrom FROM permissions WHERE  user='$user' AND YEAR(p_date)='$y'  AND status='Approved' ")->result_array();
	}

	function get_admin_permission_total($y,$user){
		return	$this->db->query("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(totalhrs))) as totalhrs FROM permissions WHERE  user='$user' AND YEAR(p_date)='$y' AND status='Approved' ")->result_array();
	}






}
	

?>