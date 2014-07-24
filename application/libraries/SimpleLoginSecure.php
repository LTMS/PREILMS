<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpass-0.1/PasswordHash.php');

define('PHPASS_HASH_STRENGTH', 8);
define('PHPASS_HASH_PORTABLE', false);

/**
 * SimpleLoginSecure Class
 *
 * Makes authentication simple and secure.
 *
 * Simplelogin expects the following database setup. If you are not using
 * this setup you may need to do some tweaking.
 *
 *
 *   CREATE TABLE `users` (
 *     `user_id` int(10) unsigned NOT NULL auto_increment,
 *     `user_email` varchar(255) NOT NULL default '',
 *     `user_pass` varchar(60) NOT NULL default '',
 *     `user_date` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'Creation date',
 *     `user_modified` datetime NOT NULL default '0000-00-00 00:00:00',
 *     `user_last_login` datetime NULL default NULL,
 *     PRIMARY KEY  (`user_id`),
 *     UNIQUE KEY `user_email` (`user_email`),
 *   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 *
 * @package   SimpleLoginSecure
 * @version   1.0.1
 * @author    Alex Dunae, Dialect <alex[at]dialect.ca>
 * @copyright Copyright (c) 2008, Alex Dunae
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://dialect.ca/code/ci-simple-login-secure/
 */
class SimpleLoginSecure
{
	var $CI;
	var $user_table = 'admin_users';

	/**
	 * Create a user account
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function create($uname = '',$user_email = '', $user_pass = '',$userrole = '',$addedname='',$mail='',$to_id='',$auto_login = false)
	{
		$this->CI =& get_instance();



		//Make sure account info was sent
		if($user_email == '' OR $user_pass == '') {
			return false;
		}

		//Check against user table
		$this->CI->db->where('user_email', $user_email);
		$query = $this->CI->db->get_where($this->user_table);

		if ($query->num_rows() > 0) //user_email already exists
		return false;

		//Hash user_pass using phpass
		$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		$user_pass_hashed = $hasher->HashPassword($user_pass);

		//Insert account into the database
		$data = array(
					'user_email' => $user_email,
					'user_pass' => $user_pass_hashed,
					'user_date' => date('c'),
					'user_modified' => date('c'),
					'user_role'=> $userrole,
					'name'=>$uname,
					'added_by'=>$addedname,
					'email'=>$mail,
					'timeoffice_id'=>$to_id
		);

		$this->CI->db->set($data);

		if(!$this->CI->db->insert($this->user_table)) //There was a problem!
		return false;

		if($auto_login)
		$this->login($user_email, $user_pass);

		return true;
	}

	function update($uname,$username,$passwd,$userrole,$to_id){
		$this->CI =& get_instance();
		if($passwd!=''){
			$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			$user_pass_hashed = $hasher->HashPassword($passwd);
		}
		/*$data = array(
		 'user_modified' => date('c'),
		 'user_role'=> $userrole,
		 'name'=>$uname,
		 'phone_number'=>$ph_num
		 );
		 //$this->CI->db->set($data);

		 $where="user_email='$username'";
			//if(!$this->CI->db->update_string('admin_users',$data,$where)) //There was a problem!
			//return false;
			$this->CI->db->update_string($this->user_table,$data,$where);
			//return true;
			* */
		if($passwd==''){
			$this->CI->db->simple_query("UPDATE " . $this->user_table  . " SET user_role ='".$userrole."',name='".$uname."',timeoffice_id='".$to_id."'  WHERE user_email = '" . $username."'");
		}
		else if($passwd!='')
		{
			$this->CI->db->simple_query("UPDATE " . $this->user_table  . " SET user_pass='".$user_pass_hashed."',user_role ='".$userrole."',name='".$uname."',timeoffice_id='".$to_id."'   WHERE user_email = '" . $username."'");
		}

		return true;
	}
	/**
	 * Login and sets session variables
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function login($user_email = '', $user_pass = '')
	{
		$this->CI =& get_instance();

		if($user_email == '' OR $user_pass == '')
		return false;


		//Check if already logged in
		if($this->CI->session->userdata('admin_user_email') == $user_email)
		return true;


		//Check against user table
		$this->CI->db->where('user_email', $user_email);
		$query = $this->CI->db->get_where($this->user_table);


		if ($query->num_rows() > 0)
		{
			$user_data = $query->row_array();

			$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);

			if(!$hasher->CheckPassword($user_pass, $user_data['user_pass']))
			return false;

			//Destroy old session
			$this->CI->session->sess_destroy();
				
			//Create a fresh, brand new session
			$this->CI->session->sess_create();
			$query = $this->CI->db->query("SELECT * FROM admin_users where user_email= '$user_email'");
			$row = $query->row_array();
			$user_role=$row['user_role'];
			$full_name=$row['name'];
			$timeoffice_id=$row['timeoffice_id'];
			$this->CI->db->simple_query('UPDATE ' . $this->user_table  . ' SET user_last_login = NOW() WHERE user_id = ' . $user_data['user_id']);

			//Set session data
			unset($user_data['user_pass']);
			$user_data['admin_user_email'] = $user_data['user_email']; // for compatibility with Simplelogin
			$user_data['admin_logged_in'] = true;
			$user_data['userrole'] = $user_role;
			$user_data['fullname'] = $full_name;
			$timeoffice_id=$row['timeoffice_id'];
			$this->CI->session->set_userdata($user_data);
				
			return true;
		}
		else
		{
			return false;
		}

	}

	/**
	 * Logout user
	 *
	 * @access	public
	 * @return	void
	 */
	function logout() {
		$this->CI =& get_instance();

		$this->CI->session->sess_destroy();
	}

	/**
	 * Delete user
	 *
	 * @access	public
	 * @param integer
	 * @return	bool
	 */
	function delete($user_id)
	{
		$this->CI =& get_instance();

		if(!is_numeric($user_id))
		return false;

		return $this->CI->db->delete($this->user_table, array('user_id' => $user_id));
	}


	function update_details($name,$pwd,$id ){
		$this->CI =& get_instance();
		if($pwd!=''){
			$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			$pwd_hashed = $hasher->HashPassword($pwd);
		}
			
		if($pwd != ""){
			$this->CI->db->query("UPDATE admin_users SET name='$name', user_pass='$pwd_hashed', modifiedon=CURRENT_TIMESTAMP  WHERE user_id='$id' ");
				
		}
		else{
			$this->CI->db->query("UPDATE admin_users SET name='$name',   modifiedon=CURRENT_TIMESTAMP  WHERE user_id='$id' ");
		}


	}



}
?>
