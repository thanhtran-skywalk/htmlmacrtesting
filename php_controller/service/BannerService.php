<?php

require_once('BaseDAO.php');

class BannerService
{
	private $tableName = "macr_banner";
	private $db;

	public function __construct()
	{
		$this->db = new BaseDAO();
	}

	public function getList(){
		$this->db->set_orderby('macr_order','ASC');
		return $this->db->get_all($this->tableName);
	}


	public function findById($id){
		$condition = array('id' => $id);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertItem($macr_image, $macr_logo, $macr_title, $macr_short_slogan, $macr_url, $macr_order){
		$data = array('macr_image' => $macr_image, 'macr_logo' => $macr_logo, 'macr_title' => $macr_title, 'macr_short_slogan' => $macr_short_slogan, 'macr_url' => $macr_url, 'macr_order' => $macr_order);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateItem($id, $macr_image, $macr_logo, $macr_title, $macr_short_slogan, $macr_url, $macr_order){
		$data = array('macr_image' => $macr_image, 'macr_logo' => $macr_logo, 'macr_title' => $macr_title, 'macr_short_slogan' => $macr_short_slogan, 'macr_url' => $macr_url, 'macr_order' => $macr_order);
		$condition = array('id' => $id);
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteItem($id){
		$condition = array('id' => $id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>