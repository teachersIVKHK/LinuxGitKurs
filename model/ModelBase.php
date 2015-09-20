<?php
// model/ModelBase.php
abstract class ModelBase {

protected $tableName;
protected $tableFields;
private $DBH;
private $host='localhost';
private $db='blogdb';
private $user='root';
private $pass='12345';
private $charset='UTF8';

public function __construct()
{
    $this->getTableName();
    $this->getTableFiels();

    $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    $opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    try{
        $this->DBH = new PDO($dsn, $this->user, $this->pass, $opt);
    }catch(PDOException $e) {  
        echo "У нас проблемы с подключением к базе.";
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);   
    }
    
    // $link = mysql_connect('localhost', 'root', '12345');
    // mysql_select_db('blogdb', $link);
    // mysql_query('SET NAMES utf8');

    // $this->link=$link;
}
abstract protected function getTableName();
abstract protected function getTableFiels();
abstract public function addRow();
abstract public function delRow();


// private function close_database_connection($this->link)
// {
//     $this-DBH=null;
//     //mysql_close($this->link);
// }

public function getAllRows()
{
    //$fieldList=implode(',',$tableFields);
    $sql="SELECT * FROM $this->tableName";
    //Так как нет переменных в запросе, его можно не препарировать
    $STH = $this->DBH->query($sql);
    $rows = array();
    while ($row = $STH->fetch())
    {
        $rows[] = $row;
    }
    // $result = mysql_query('SELECT id, title FROM post', $this->link);
    // $posts = array();
    // while ($row = mysql_fetch_assoc($result)) {
    //     $posts[] = $row;
    // }
    // $this->close_database_connection($this->link);

    return $rows;
}

public function getRowById($id)
{
    $sql="SELECT * FROM $this->tableName WHERE `id`=?";
    $STH = $this->DBH->prepare($sql);
    $STH->execute(array($id));
    $row = $STH->fetch();
    
    
    // $result = mysql_query("SELECT `title`,`content`,`autor`,`date` FROM post WHERE `id`='$id'", $this->link);

    // $row = mysql_fetch_assoc($result);
    //     $post = $row;

    // this->close_database_connection($this->link);

    return $row;
}

protected function _addNewRow($data)
{

    //инициируем строку с полями таблицы
    $tableFields=array_keys($data);
    $tableNameFields=implode(',',$tableFields);
    
    //массив переменных, который будем добавлять в базу
    $dataValues=array_values($data);
    
    //определяем количество плейсхолдеров и пишем их в переменную
    $n=count($dataValues);
    $placeholders='?';
    for ($i=1;$i<$n;$i++){
       $placeholders.=',?'; 
    }
    $sql="INSERT INTO $this->tableName ($tableNameFields) VALUES ($placeholders)";
    $STH = $this->DBH->prepare($sql);
    $STH->execute($dataValues);
    // $row = $STH->fetch();
    // $result = mysql_query("INSERT INTO `post`(`date`, `autor`, `title`, `content`)
     // VALUES ('$date','$autor','$title','$content')", $this->link);
    // this->close_database_connection($this->link);
    // return $post;
}

protected function _delRowById($id){
    $sql="DELETE FROM $this->tableName WHERE id=?";
    $STH=$this->DBH->prepare($sql);
    $STH->execute(array($id));
}
}