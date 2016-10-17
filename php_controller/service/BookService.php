<?php

require_once('BaseDAO.php');

class BookService
{
	private $tableName = "macr_books";
	private $pageSize = 10;
	private $db;

	public function __construct()
	{
		$this->db = new BaseDAO();
	}

	public function getBookList($page, $limit=10){
		$startIndex = $page * $this->pageSize;
		$this->db->set_orderby('macr_book_publish_date','DESC');
		$this->db->set_limit($startIndex, $limit);

		return $this->db->get_all($this->tableName);
	}

	public function findBookById($id){
		$condition = array('macr_book_id' => $id);
		$rs = $this->db->get_one($this->tableName, $condition);
		return $rs;
	}

	public function insertBook($macr_book_name, $macr_book_author, $macr_book_description, $macr_book_img_path, $publisher){
		$data = array('macr_book_name' => $macr_book_name, 'macr_book_author' => $macr_book_author, 'macr_book_description' => $macr_book_description, 'macr_book_img_path' => $macr_book_img_path, 'publisher' => $publisher);
		return $this->db->insert($this->tableName, $data);
	}

	public function updateBook($macr_book_id, $macr_book_name, $macr_book_author, $macr_book_description, $macr_book_img_path, $publisher){
		$data = array('macr_book_name' => $macr_book_name, 'macr_book_author' => $macr_book_author, 'macr_book_description' => $macr_book_description, 'macr_book_img_path' => $macr_book_img_path, 'publisher' => $publisher);
		$condition = array('macr_book_id' => $macr_book_id);
		return $this->db->update($this->tableName, $data, $condition);
	}

	public function deleteBook($macr_book_id){
		$condition = array('macr_book_id' => $macr_book_id);
		return $this->db->delete($this->tableName, $condition);
	}
}

?>