<?php

require_once('BaseDAO.php');

class IntroService
{
	private $tableName = "macr_intro";
	private $db;

	public function __construct()
	{
		$this->db = new BaseDAO();
	}

	public function getList(){
		return $this->db->get_all($this->tableName);
	}

	public function findByType($type){
		$condition = array('is_macrgroup' => $type);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function findById($id){
		$condition = array('id' => $id);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertItem($macr_intro_content, $sub_description, $macr_story, $adviser, $core_value, $destiny, $is_macrgroup){
		$data = array('macr_intro_content' => $macr_intro_content, 'sub_description' => $sub_description, 'macr_story' => $macr_story, 'adviser' => $adviser, 'core_value' => $core_value, 'destiny' => $destiny, 'is_macrgroup' => $is_macrgroup);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateItem($id, $macr_intro_content, $sub_description, $macr_story, $adviser, $core_value, $destiny, $is_macrgroup){
		$data = array('macr_intro_content' => $macr_intro_content, 'sub_description' => $sub_description, 'macr_story' => $macr_story, 'adviser' => $adviser, 'core_value' => $core_value, 'destiny' => $destiny, 'is_macrgroup' => $is_macrgroup);
		$condition = array('id' => $id);
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteItem($id){
		$condition = array('id' => $id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>