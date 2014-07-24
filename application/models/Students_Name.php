<?php

class Student_Name extends CI_Model {

	function getStudentDetails($stuName) {
		$query = "PUT YOUR QUERY";
		$result = mysql_query($query);
		return $result;
	}
}

?>