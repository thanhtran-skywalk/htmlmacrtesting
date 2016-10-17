<?php

require_once('BaseDAO.php');

class ContactService
{
	private $tableName = "macr_contact";
	private $db;

	public function __construct()
	{
		$this->db = new BaseDAO();
	}

	public function getList(){
		return $this->db->get_all($this->tableName);
	}

	public function findById($id){
		$condition = array('id' => $id);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertItem($adress, $phone, $email, $workingtimenormal, $workingtimeweeken, $map){
		$data = array('adress' => $adress, 'phone' => $phone, 'email' => $email, 'workingtimenormal' => $workingtimenormal, 'workingtimeweeken' => $workingtimeweeken, 'map' => $map);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateItem($adress, $phone, $email, $workingtimenormal, $workingtimeweeken, $map){
		$data = array('adress' => $adress, 'phone' => $phone, 'email' => $email, 'workingtimenormal' => $workingtimenormal, 'workingtimeweeken' => $workingtimeweeken, 'map' => $map);
		$condition = array('id' => "1");
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteItem($id){
		$condition = array('id' => $id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>