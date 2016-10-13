<?php

require_once('BaseDAO.php');

class LibService
{
	private $tableName = "macr_law_document";
	private $pageSize = 10;
	private $db;

	public function __construct()
	{
		$this->db = new BaseDAO();
	}

	public function getLawDocsList($page){
		$startIndex = $page * $this->pageSize;
		$this->db->set_orderby('macr_law_date','DESC');
		$this->db->set_limit($startIndex, $this->pageSize);
		
		return $this->db->get_all($this->tableName);
	}

	public function findLawDocById($id){
		$condition = array('macr_law_id' => $id);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertLawDoc($macr_law_id, $macr_law_titile, $macr_law_content, $macr_img_path){
		$data = array('macr_law_id' => $macr_law_id, 'macr_law_titile' => $macr_law_titile, 'macr_law_content' => $macr_law_content, 'macr_img_path' => $macr_img_path);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateLawDoc($macr_law_id, $macr_law_titile, $macr_law_content, $macr_img_path){
		$data = array('macr_law_id' => $macr_law_id, 'macr_law_titile' => $macr_law_titile, 'macr_law_content' => $macr_law_content, 'macr_img_path' => $macr_img_path);
		$condition = array('macr_law_id' => $macr_law_id);
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteLawDoc($macr_law_id){
		$condition = array('macr_law_id' => $macr_law_id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>