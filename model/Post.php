<?php
// model/Post.php

class Post extends ModelBase{
	public function __construct(){
		parent:: __construct();

	}

protected function getTableName(){
	$this->tableName='post';
}
protected function getTableFiels(){
	$this->tableFields=array('id','date','autor','title','content');
}
public function addRow(){
	//располагать по порядку полей в $this->tableFields
	$data[$this->tableFields[1]]=$_REQUEST['add_date'];
	$data[$this->tableFields[2]]=$_REQUEST['add_autor'];
	$data[$this->tableFields[3]]=$_REQUEST['add_title'];
    $data[$this->tableFields[4]]=$_REQUEST['add_content'];
    $this->_addNewRow($data);
}
public function delRow(){
	$id=$data[$this->tableFields[0]]=$_REQUEST['id'];
	$this->_delRowById($id);
}
}