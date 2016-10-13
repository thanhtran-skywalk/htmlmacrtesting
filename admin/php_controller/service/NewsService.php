<?php

require_once('BaseDAO.php');

class NewsService
{
	private $tableName = "macr_news";
	private $pageSize = 10;
	private $db;

	public function __construct()
	{
		$this->db = new BaseDAO();
	}

	public function getNewsList($page){
		$startIndex = $page * $this->pageSize;
		$this->db->set_orderby('macr_news_date','DESC');
		$this->db->set_limit($startIndex, $this->pageSize);

		return $this->db->get_all($this->tableName);
	}

	public function findNewsById($id){
		$condition = array('macr_news_id' => $id);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertNews($macr_news_title, $macr_news_contents, $macr_img_path){
		$data = array('macr_news_title' => $macr_news_title, 'macr_news_contents' => $macr_news_contents, 'macr_img_path' => $macr_img_path);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateNews($macr_news_id, $macr_news_title, $macr_news_contents, $macr_img_path){
		$data = array('macr_news_title' => $macr_news_title, 'macr_news_contents' => $macr_news_contents, 'macr_img_path' => $macr_img_path);
		$condition = array('macr_news_id' => $macr_news_id);
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteNews($macr_news_id){
		$condition = array('macr_news_id' => $macr_news_id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>