<?php

require_once('BaseDAO.php');

class UserService
{
	private $tableName = "macr_user";
	private $pageSize = 20;
	private $db;

	public function __construct()
	{
		$this->db = new BaseDAO();
	}

	public function getListUser($page){
		$startIndex = $page * $this->pageSize;
		$this->db->set_limit($startIndex, $this->pageSize);

		//$this->db->set_orderby('macr_user_id','ASC');

		return $this->db->get_all($this->tableName);
	}

	public function findByUserId($userid){
		$condition = array('macr_user_id' => $userid);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function findByUserNameAndPassword($username, $password){
		$condition = array('macr_user_name' => $username, 'macr_password' => md5($password));
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertUser($macr_user_name, $macr_full_name, $macr_email, $macr_password, $macr_position, $macr_education, $macr_major, $macr_img_path){
		$data = array('macr_user_name' => $macr_user_name, 'macr_full_name' => $macr_full_name, 'macr_email' => $macr_email, 'macr_password' => md5($macr_password), 'macr_position' => $macr_position, 'macr_education' => $macr_education, 'macr_major' => $macr_major, 'macr_img_path' => $macr_img_path);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateUser($macr_user_id, $macr_user_name, $macr_full_name, $macr_email, $macr_password, $macr_position, $macr_education, $macr_major, $macr_img_path){
		$data = array('macr_user_name' => $macr_user_name, 'macr_full_name' => $macr_full_name, 'macr_email' => $macr_email, 'macr_password' => md5($macr_password), 'macr_position' => $macr_position, 'macr_education' => $macr_education, 'macr_major' => $macr_major, 'macr_img_path' => $macr_img_path);
		$condition = array('macr_user_id' => $macr_user_id);
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteUser($macr_user_id){
		$condition = array('macr_user_id' => $macr_user_id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>