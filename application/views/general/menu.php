<!-- FOR MD -->
<?php if($this->session->userdata('userrole')=='MD'){ ?>
<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='LMS')) echo "current"; ?>">Leave
		Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("lms/pending_applications"); ?>"
		<?php if ($submenu=='pending_applications'){?> class="current"
		<?php }?>>Level - 2 Applications</a></li>
		<li><a href="<?php echo site_url("lms/pending_applications_lev1"); ?>"
		<?php if ($submenu=='pending_applications_lev1'){?> class="current"
		<?php }?>>Level - 1 Applications</a></li>
		<li><a href="<?php echo site_url("lms/permissions"); ?>"
		<?php if ($submenu=='permissions'){?> class="current" <?php }?>>Pending		Permissions</a></li>
		<li><a href="<?php echo site_url("lms/history_md"); ?>"
		<?php if ($submenu=='history_admin'){?> class="current" <?php }?>>Employees		Leave History</a></li>
		<li><a href="<?php echo site_url("lms/leave_summary_md"); ?>"
		<?php if ($submenu=='summary'){?> class="current" <?php }?>>Employees		Leave Summary</a></li>
		<li><a href="<?php echo site_url("lms/leave_reprocess"); ?>"
		<?php if ($submenu=='reprocess'){?> class="current" <?php }?>>Reprocess	Approved Leaves</a></li>
		<li><a href="<?php echo site_url("lms/md_permission"); ?>"
		<?php if ($submenu=='md_permission'){?> class="current" <?php }?>>Employees	Permission History</a></li>
		<li><a href="<?php echo site_url("lms/index"); ?>"
		<?php if ($submenu=='lms_intro'){?> class="current" <?php }?>>Leave 	Management Criteria</a></li>
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='e_reports')) echo "current"; ?>">TimeSheet
		Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("lms/lop_admin"); ?>"
		<?php if ($submenu=='lop_admin'){?> class="current" <?php }?>>Update	Loss of Pay [LOP]</a></li>
		<li><a href="<?php echo site_url("timesheet/teamsheet"); ?>"
		<?php if ($submenu=='teamsheet'){?> class="current" <?php }?>>Employees	Time Sheet</a></li>
		<li><a href="<?php echo site_url("timesheet/teamsheet_dept"); ?>"
		<?php if ($submenu=='teamsheet_dept'){?> class="current" <?php }?>>Extensive	Time Sheet Report</a></li>
		<li><a href="<?php echo site_url("timesheet/timesheet_jobwise"); ?>"
		<?php if ($submenu=='timesheet_jobwise'){?> class="current" <?php }?>>Jobwise 	Time Sheet</a></li>
		<li><a href="<?php echo site_url("timesheet/timesheet_jobwise_week"); ?>"
		<?php if ($submenu=='timesheet_jobwise_week'){?> class="current" <?php }?>>MIS - Time Sheet</a></li>
		<li><a href="<?php echo site_url("timesheet/admin_ot"); ?>"
		<?php if ($submenu=='admin_ot'){?> class="current" <?php }?>>Employees	O-T Details</a></li>
		<li><a href="<?php echo site_url("timesheet/admin_otsummary"); ?>"
		<?php if ($submenu=='admin_otsummary'){?> class="current" <?php }?>>Employees	O-T Summary</a></li>
		<li><a href="<?php echo site_url("timesheet/ack_ot_history"); ?>"
		<?php if ($submenu=='ack_ot_history'){?> class="current" <?php }?>>Acknowledged	OT History</a></li>
		<li><a href="<?php echo site_url("timesheet/locked_users_md"); ?>"
		<?php if ($submenu=='locked_users'){?> class="current" <?php }?>>Time Sheet Locked Users</a></li>
		<li><a
			href="<?php echo site_url("timesheet/not_timesheet_updated"); ?>"
			<?php if ($submenu=='not_updated'){?> class="current" <?php }?>>Employees		Un-Updated Timesheet</a></li>
		<!--  		   			<li><a href="<?php echo site_url("timesheet/intro_admin"); ?>" <?php if ($submenu=='tms_intro'){?>class="current"<?php }?> >Time Sheet Criteria</a></li>
  -->
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='misc')) echo "current"; ?>">Miscellaneous</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("lms/add_dept"); ?>"
		<?php if ($submenu=='add_dept'){?> class="current" <?php }?>>Manage		Departments</a></li>
		<li><a href="<?php echo site_url("general/parameters");?>"
		<?php if ($submenu=='parameters'){?> class="current" <?php }?>>		Manage Office Time</a></li>
		<li><a href="<?php echo site_url("general/holidays");?>"
		<?php if ($submenu=='holidays'){?> class="current" <?php }?>>		Holidays Details</a></li>
		<li><a href="<?php echo site_url("users/Users_Info");?>"
		<?php if ($submenu=='users_info'){?> class="current" <?php }?>>		Employees Details</a></li>
	</ul>
</li>

<li><a href="javascript:void(0);"	class="nav-top-item <?php if($menu=='users') echo "current"; ?> "> User		Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("users/add_new_user");?>"
		<?php if ($submenu=='add_new_user'){?> class="current" <?php }?>> Add		New User</a></li>
		<li><a href="<?php echo site_url("users/list_users");?>"
		<?php if ($submenu=='list_users'){?> class="current" <?php }?>> List		of Users</a></li>
	</ul>
</li>
<li><a href="javascript:void(0);"
	class="nav-top-item <?php if($menu=='my_account') echo "current"; ?> ">	My Account Details</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("users/employee_details");?>"
		<?php if ($submenu=='employee_details'){?> class="current" <?php }?>>My		rofile </a></li>
		<li><a href="<?php echo site_url("general/mydetails"); ?>"
		<?php if ($submenu=='mydetails'){?> class="current" <?php }?>>My App	Account </a></li>
	</ul>
</li>

<li><a class="nav-top-item"
	href="<?php echo site_url("general/ErrorReport");?>"
	<?php if ($menu=='error' && $submenu='error' ){?> class="current"
	<?php }?>><font color='#2F74D0' face='Lucida Handwriting'><i>Feedback</i>
	</font> </a></li>


	<?php }?>



<!-- FOR Admin -->
	<?php if($this->session->userdata('userrole')=='admin'){ ?>
<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='LMS')) echo "current"; ?>">My
		Leave Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("lms/apply"); ?>"
		<?php if ($submenu=='apply'){?> class="current" <?php }?>>Apply for
				Leave</a></li>
		<!-- 		<li><a href="<?php echo site_url("lms/leave_others"); ?>" <?php if ($submenu=='apply_others'){?>class="current"<?php }?> >Apply Leave for Other</a></li>  -->
		<li><a href="<?php echo site_url("lms/history"); ?>"
		<?php if ($submenu=='history'){?> class="current" <?php }?>>My Leave		History</a></li>
		<li><a href="<?php echo site_url("lms/my_lop"); ?>"
		<?php if ($submenu=='my_lop'){?> class="current" <?php }?>>My LOP		History</a></li>
		<li><a href="<?php echo site_url("lms/my_leave_summary"); ?>"
		<?php if ($submenu=='my_summary'){?> class="current" <?php }?>>My		Leave Summary</a></li>
		<li><a href="<?php echo site_url("lms/my_permission"); ?>"
		<?php if ($submenu=='my_permission'){?> class="current" <?php }?>>My		Permission History</a></li>
		<li><a href="<?php echo site_url("lms/index"); ?>"
		<?php if ($submenu=='lms_intro'){?> class="current" <?php }?>>Leave		Management Criteria</a></li>
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='timesheet')) echo "current"; ?>">My
		Time Sheet </a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("timesheet/index"); ?>"
		<?php if ($submenu=='entry'){?> class="current" <?php }?>>Time Sheet		Entry</a></li>
		<!-- 	<li><a href="<?php echo site_url("timesheet/edit_timesheet"); ?>" <?php if ($submenu=='edit_timesheet'){?>class="current"<?php }?> >Edit Time Sheet Data</a></li> -->
		<li><a href="<?php echo site_url("timesheet/mysheet"); ?>"
		<?php if ($submenu=='mysheet'){?> class="current" <?php }?>>My Time	Sheet Report</a></li>
		<li><a href="<?php echo site_url("timesheet/my_ot"); ?>"
		<?php if ($submenu=='my_ot'){?> class="current" <?php }?>>My OT	Details</a></li>
		<li><a href="<?php echo site_url("timesheet/my_otsummary"); ?>"
		<?php if ($submenu=='my_otsummary'){?> class="current" <?php }?>>My	OT Summary</a></li>
		<li><a href="<?php echo site_url("timesheet/my_ack_otsummary"); ?>"
		<?php if ($submenu=='my_ack_otsummary'){?> class="current" <?php }?>>My		Acknowledged O-T History</a></li>
		<!--    		<li><a href="<?php echo site_url("timesheet/intro"); ?>" <?php if ($submenu=='tms_intro'){?>class="current"<?php }?> >Time Sheet Criteria</a></li>
-->
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='e_reports')) echo "current"; ?>">Employees
		Reports</a>
	<ul style="display: block;">
		<li>------  -----   LEAVE   -----  ------</li>
		<li><a href="<?php echo site_url("lms/lop_admin"); ?>"
		<?php if ($submenu=='lop_admin'){?> class="current" <?php }?>>Update Loss of Pay [LOP]</a></li>
		<li><a href="<?php echo site_url("lms/history_admin"); ?>"
		<?php if ($submenu=='history_admin'){?> class="current" <?php }?>>Employees	Leave History</a></li>
		<li><a href="<?php echo site_url("lms/admin_permission"); ?>"
		<?php if ($submenu=='admin_permission'){?> class="current" <?php }?>>Employees		Permission History</a></li>
		<li><a href="<?php echo site_url("lms/leave_summary"); ?>"
		<?php if ($submenu=='summary'){?> class="current" <?php }?>>Employees	Leave Summary</a></li>
		<li>-----  ----   TIMESHEET   ---- -----</li>
		<li><a href="<?php echo site_url("timesheet/teamsheet"); ?>"
		<?php if ($submenu=='teamsheet'){?> class="current" <?php }?>>Employees	Time Sheet</a></li>
		<li><a href="<?php echo site_url("timesheet/teamsheet_dept"); ?>"
		<?php if ($submenu=='teamsheet_dept'){?> class="current" <?php }?>>Extensive	Time Sheet Report</a></li>
		<li><a href="<?php echo site_url("timesheet/timesheet_jobwise"); ?>"
		<?php if ($submenu=='timesheet_jobwise'){?> class="current" <?php }?>>Jobwise 	Time Sheet</a></li>
		<li><a href="<?php echo site_url("timesheet/timesheet_jobwise_week"); ?>"
		<?php if ($submenu=='timesheet_jobwise_week'){?> class="current" <?php }?>>MIS - Time Sheet</a></li>
		<li><a href="<?php echo site_url("timesheet/admin_ot"); ?>"
		<?php if ($submenu=='admin_ot'){?> class="current" <?php }?>>Employees	O-T Details</a></li>
		<li><a href="<?php echo site_url("timesheet/admin_otsummary"); ?>"
		<?php if ($submenu=='admin_otsummary'){?> class="current" <?php }?>>Employees	O-T Summary</a></li>
		<li><a href="<?php echo site_url("timesheet/ack_ot_history"); ?>"
		<?php if ($submenu=='ack_ot_history'){?> class="current" <?php }?>>Acknowledged	OT History</a></li>
		<li><a href="<?php echo site_url("timesheet/locked_users_md"); ?>"
		<?php if ($submenu=='locked_users'){?> class="current" <?php }?>>Time	Sheet Locked Users</a></li>
		<li><a
			href="<?php echo site_url("timesheet/not_timesheet_updated"); ?>"
			<?php if ($submenu=='not_updated'){?> class="current" <?php }?>>Employees		Un-Updated Timesheet</a></li>
	</ul>
</li>



<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='misc')) echo "current"; ?>">Miscellaneous</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("timesheet/addjobs"); ?>"
		<?php if ($submenu=='addjobs'){?> class="current" <?php }?>>ManageJobs</a></li>
				<li><a href="<?php echo site_url("general/jobstatus"); ?>"
		<?php if ($submenu=='jobstatus'){?> class="current" <?php }?>>Jobs Details</a></li>
		<li><a href="<?php echo site_url("lms/add_dept"); ?>"
		<?php if ($submenu=='add_dept'){?> class="current" <?php }?>>Manage	Departments</a></li>
		<li><a href="<?php echo site_url("general/holidays");?>"
		<?php if ($submenu=='holidays'){?> class="current" <?php }?>> Manage Holidays</a></li>
		<li><a href="<?php echo site_url("general/parameters");?>"
		<?php if ($submenu=='parameters'){?> class="current" <?php }?>>
				Manage Office Time</a></li>
		<li><a href="<?php echo site_url("timesheet/set_inout_time"); ?>"
		<?php if ($submenu=='set_inout_time'){?> class="current" <?php }?>>Update	Time Office IN-OUT</a></li>
		<li><a href="<?php echo site_url("users/Users_Info");?>"
		<?php if ($submenu=='users_info'){?> class="current" <?php }?>>
				Employees Details</a></li>
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if($menu=='users') echo "current"; ?> "> User Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("users/add_new_user");?>"
		<?php if ($submenu=='add_new_user'){?> class="current" <?php }?>> Add	New User</a></li>
		<li><a href="<?php echo site_url("users/list_users");?>"
		<?php if ($submenu=='list_users'){?> class="current" <?php }?>> List 	of Users</a></li>
	</ul>
</li>


<li><a href="javascript:void(0);"
	class="nav-top-item <?php if($menu=='my_account') echo "current"; ?> ">
		My Account Details</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("users/employee_details");?>"
		<?php if ($submenu=='employee_details'){?> class="current" <?php }?>>My	Profile </a></li>
		<li><a href="<?php echo site_url("general/mydetails"); ?>"
		<?php if ($submenu=='mydetails'){?> class="current" <?php }?>>My App	Account </a></li>
	</ul>
</li>

<li><a class="nav-top-item"
	href="<?php echo site_url("general/ErrorReport");?>"
	<?php if ($menu=='error' && $submenu='error' ){?> class="current"
	<?php }?>><font color='#2F74D0' face='Lucida Handwriting'><i>Feedback</i>
	</font> </a></li>


	<?php }?>



<!--  For Team Leader -->
	<?php if($this->session->userdata('userrole')=='teamleader'){ ?>
<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='LMS')) echo "current"; ?>">Leave
		Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("lms/apply"); ?>"
		<?php if ($submenu=='apply'){?> class="current" <?php }?>>Apply For	Leave</a></li>
		<li><a href="<?php echo site_url("lms/pending_applications"); ?>"
		<?php if ($submenu=='pending_applications'){?> class="current"
		<?php }?>>Pending Leave Applications</a></li>
		<li><a href="<?php echo site_url("lms/history"); ?>"
		<?php if ($submenu=='history'){?> class="current" <?php }?>>My Leave History</a></li>
		<li><a href="<?php echo site_url("lms/my_lop"); ?>"
		<?php if ($submenu=='my_lop'){?> class="current" <?php }?>>My LOP	History</a></li>
		<li><a href="<?php echo site_url("lms/my_leave_summary"); ?>"
		<?php if ($submenu=='my_summary'){?> class="current" <?php }?>>My	Leave Summary</a></li>
		<li><a href="<?php echo site_url("lms/my_permission"); ?>"
		<?php if ($submenu=='my_permission'){?> class="current" <?php }?>>My	Permission History</a></li>
		<li><a href="<?php echo site_url("lms/history_teamleader"); ?>"
		<?php if ($submenu=='history_teamleader'){?> class="current"
		<?php }?>>Department Leave History</a></li>
		<li><a href="<?php echo site_url("lms/index"); ?>"
		<?php if ($submenu=='lms_intro'){?> class="current" <?php }?>>Leave 	Management Criteria</a></li>
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='timesheet')) echo "current"; ?>">TimeSheet
		Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("timesheet/index"); ?>"
		<?php if ($submenu=='entry'){?> class="current" <?php }?>>Time Sheet	Entry</a></li>
		<li><a href="<?php echo site_url("timesheet/mysheet"); ?>"
		<?php if ($submenu=='mysheet'){?> class="current" <?php }?>>My Time	Sheet Report</a></li>
		<li><a href="<?php echo site_url("timesheet/my_ot"); ?>"
		<?php if ($submenu=='my_ot'){?> class="current" <?php }?>>My Over	Time Details</a></li>
		<li><a href="<?php echo site_url("timesheet/my_otsummary"); ?>"
		<?php if ($submenu=='my_otsummary'){?> class="current" <?php }?>>My	Over Time Summary</a></li>
		<li><a href="<?php echo site_url("timesheet/my_ack_otsummary"); ?>"
		<?php if ($submenu=='my_ack_otsummary'){?> class="current" <?php }?>>My	Acknowledged O-T History</a></li>
		<li><a href="<?php echo site_url("timesheet/teamsheet_leader"); ?>"
		<?php if ($submenu=='teamsheet_leader'){?> class="current" <?php }?>>My	Team Time Sheet</a></li>
		<!-- 	   			<li><a href="<?php echo site_url("timesheet/intro"); ?>" <?php if ($submenu=='tms_intro'){?>class="current"<?php }?> >Time Sheet Criteria</a></li>
	 -->
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='misc')) echo "current"; ?>">Miscellaneous</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("timesheet/addjobs"); ?>"
		<?php if ($submenu=='addjobs'){?> class="current" <?php }?>>Manage	Jobs</a></li>
		<li><a href="<?php echo site_url("general/holidays_emp");?>"
		<?php if ($submenu=='holidays_emp'){?> class="current" <?php }?>>	Holidays Details</a></li>
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if($menu=='my_account') echo "current"; ?> ">
		My Account Details</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("users/employee_details");?>"
		<?php if ($submenu=='employee_details'){?> class="current" <?php }?>>My		Profile </a></li>
		<li><a href="<?php echo site_url("general/mydetails"); ?>"
		<?php if ($submenu=='mydetails'){?> class="current" <?php }?>>My App		Account </a></li>
	</ul>
</li>
<li><a class="nav-top-item"
	href="<?php echo site_url("general/ErrorReport");?>"
	<?php if ($menu=='error' && $submenu='error' ){?> class="current"
	<?php }?>><font color='#2F74D0' face='Lucida Handwriting'><i>Feedback</i>
	</font> </a></li>


	<?php }?>



<!--  For User/Employee -->
	<?php if($this->session->userdata('userrole')=='user'){ ?>
<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='LMS')) echo "current"; ?>">Leave
		Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("lms/apply"); ?>"
		<?php if ($submenu=='apply'){?> class="current" <?php }?>>Apply For	Leave</a></li>
		<li><a href="<?php echo site_url("lms/history"); ?>"
		<?php if ($submenu=='history'){?> class="current" <?php }?>>My Leave	History</a></li>
		<li><a href="<?php echo site_url("lms/my_lop"); ?>"
		<?php if ($submenu=='my_lop'){?> class="current" <?php }?>>My LOP	History</a></li>
		<li><a href="<?php echo site_url("lms/my_leave_summary"); ?>"
		<?php if ($submenu=='my_summary'){?> class="current" <?php }?>>My	Leave Summary</a></li>
		<li><a href="<?php echo site_url("lms/my_permission"); ?>"
		<?php if ($submenu=='my_permission'){?> class="current" <?php }?>>My	Permission History</a></li>
		<li><a href="<?php echo site_url("lms/index"); ?>"
		<?php if ($submenu=='lms_intro'){?> class="current" <?php }?>>Leave	Management Criteria</a></li>
	</ul>
</li>
<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='timesheet')) echo "current"; ?>">TimeSheet
		Management</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("timesheet/index"); ?>"
		<?php if ($submenu=='entry'){?> class="current" <?php }?>>Time Sheet	Entry</a></li>
		<li><a href="<?php echo site_url("timesheet/mysheet"); ?>"
		<?php if ($submenu=='mysheet'){?> class="current" <?php }?>>My Time	Sheet Report</a></li>
		<li><a href="<?php echo site_url("timesheet/my_ot"); ?>"
		<?php if ($submenu=='my_ot'){?> class="current" <?php }?>>My Over	Time Details</a></li>
		<li><a href="<?php echo site_url("timesheet/my_otsummary"); ?>"
		<?php if ($submenu=='my_otsummary'){?> class="current" <?php }?>>My	Over Time Summary</a></li>
		<li><a href="<?php echo site_url("timesheet/my_ack_otsummary"); ?>"
		<?php if ($submenu=='my_ack_otsummary'){?> class="current" <?php }?>>My Acknowledged O-T History</a></li>
	</ul>
</li>
<li><a href="javascript:void(0);"
	class="nav-top-item <?php if(($this->session->userdata('admin_logged_in'))&&($menu=='misc')) echo "current"; ?>">Miscellaneous</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("timesheet/addjobs"); ?>"
		<?php if ($submenu=='addjobs'){?> class="current" <?php }?>>Manage	Jobs</a></li>
		<li><a href="<?php echo site_url("general/holidays_emp");?>"
		<?php if ($submenu=='holidays_emp'){?> class="current" <?php }?>>
				Holidays Details</a></li>
	</ul>
</li>

<li><a href="javascript:void(0);"
	class="nav-top-item <?php if($menu=='my_account') echo "current"; ?> ">
		My Account Details</a>
	<ul style="display: block;">
		<li><a href="<?php echo site_url("users/employee_details");?>"
		<?php if ($submenu=='employee_details'){?> class="current" <?php }?>>My	Profile </a></li>
		<li><a href="<?php echo site_url("general/mydetails"); ?>"
		<?php if ($submenu=='mydetails'){?> class="current" <?php }?>>My App	Account </a></li>
	</ul>
</li>

<li><a class="nav-top-item"
	href="<?php echo site_url("general/ErrorReport");?>"
	<?php if ($menu=='error' && $submenu='error' ){?> class="current"
	<?php }?>><font color='#2F74D0' face='Lucida Handwriting'><i>Feedback</i>
	</font> </a></li>


<?php }?>
