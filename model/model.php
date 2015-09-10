<?php
// model/model.php
class Model {
    
private $this->link;

public function __construct()
{
    $link = mysql_connect('localhost', 'root', '12345');
    mysql_select_db('blogdb', $link);
    mysql_query('SET NAMES utf8');

    $this->link=$link;
}

private function close_database_connection($this->link)
{
    mysql_close($this->link);
}

public function get_all_posts()
{
    
    $result = mysql_query('SELECT id, title FROM post', $this->link);
    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }
    $this->close_database_connection($this->link);

    return $posts;
}
public function get_post_by_id($id)
{
    $result = mysql_query("SELECT `title`,`content`,`autor`,`date` FROM post WHERE `id`='$id'", $this->link);

    $row = mysql_fetch_assoc($result);
        $post = $row;

    this->close_database_connection($this->link);

    return $post;
}

public function add_new_post()
{
    $title=$_REQUEST['add_title'];
    $content=$_REQUEST['add_content'];
    $date=$_REQUEST['add_date'];
    $autor=$_REQUEST['add_autor'];

    $result = mysql_query("INSERT INTO `post`(`date`, `autor`, `title`, `content`) VALUES ('$date','$autor','$title','$content')", $this->link);

    this->close_database_connection($this->link);

    return $post;
}
}