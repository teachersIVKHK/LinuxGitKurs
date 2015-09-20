<?php
// controller/Controllers.php
class Controllers{
	private $tablePost;

	public function __construct(){
		$this->tablePost=new Post();
	}
	
	function list_action()
	{
	    $posts=$this->tablePost->getAllRows();
	    //$posts = get_all_posts();
	    require 'view/templates/list.php';
	}

	function show_action($id)
	{
	    $post=$this->tablePost->getRowById($id);
	    //$post = get_post_by_id($id);
	    require 'view/templates/show.php';
	}
	function admin_action()
	{
		$posts=$this->tablePost->getAllRows();
		require 'view/templates/admin.php';
	}
	function add_action()
	{
		$this->tablePost->addRow();
		$posts=$this->tablePost->getAllRows();
		//$posts = get_all_posts();
	    require 'view/templates/admin.php';
	}
	function delete_action()
	{
		//Удалить строку из базы
		$this->tablePost->delRow();
		// загрузить шаблон админ со всеми замисями
		$posts=$this->tablePost->getAllRows();
	    require 'view/templates/admin.php';
	}
}