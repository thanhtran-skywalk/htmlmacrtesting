<?php

require_once('BaseDAO.php');

class UserService
{
	private $tableName = "macr_user";
	private $pageSize = 10;
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

	public function findByEmailAndPassword($email, $password){
		$condition = array('macr_email' => $email, 'macr_password' => md5($password), 'macr_user_role' => 1);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertUser($macr_full_name, $macr_email, $macr_password, $macr_position, $macr_education, $macr_major, $macr_img_path, $macr_user_role, $macr_user_display_name, $macrgroup, $macr, $macrgroup_order, $macr_order){
		$data = array('macr_full_name' => $macr_full_name, 'macr_email' => $macr_email, 'macr_password' => md5($macr_password), 'macr_position' => $macr_position, 'macr_education' => $macr_education, 'macr_major' => $macr_major, 'macr_img_path' => $macr_img_path, 'macr_user_display_name' => $macr_user_display_name, 'macr_user_role' =>  $macr_user_role, 'macrgroup' => $macrgroup, 'macr' => $macr, 'macrgroup_order' => $macrgroup_order, 'macr_order' => $macr_order);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateUser($macr_user_id, $macr_full_name, $macr_email, $macr_position, $macr_education, $macr_major, $macr_img_path, $macr_user_role, $macr_user_display_name, $macrgroup, $macr, $macrgroup_order, $macr_order){
		$data = array('macr_full_name' => $macr_full_name, 'macr_email' => $macr_email, 'macr_position' => $macr_position, 'macr_education' => $macr_education, 'macr_major' => $macr_major, 'macr_img_path' => $macr_img_path, 'macr_user_display_name' => $macr_user_display_name, 'macr_user_role' =>  $macr_user_role, 'macrgroup' => $macrgroup, 'macr' => $macr, 'macrgroup_order' => $macrgroup_order, 'macr_order' => $macr_order);
		$condition = array('macr_user_id' => $macr_user_id);
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteUser($macr_user_id){
		$condition = array('macr_user_id' => $macr_user_id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>