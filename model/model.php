<?php
// model/model.php

function open_database_connection()
{
    $link = mysql_connect('localhost', 'root', '12345');
    mysql_select_db('blogdb', $link);
    mysql_query('SET NAMES utf8');

    return $link;
}

function close_database_connection($link)
{
    mysql_close($link);
}

function get_all_posts()
{
    $link = open_database_connection();
    $result = mysql_query('SELECT id, title FROM post', $link);
    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }
    close_database_connection($link);

    return $posts;
}
function get_post_by_id($id)
{
    $link = open_database_connection();
    $result = mysql_query("SELECT `title`,`content`,`autor`,`date` 
                            FROM post 
                            WHERE `id`='$id'", $link);
    $row = mysql_fetch_assoc($result);
        $post = $row;
    close_database_connection($link);

    return $post;
}

function add_new_post()
{
    $title=$_REQUEST['add_title'];
    $content=$_REQUEST['add_content'];
    $date=$_REQUEST['add_date'];
    $autor=$_REQUEST['add_autor'];
    if(empty($title) && empty($content && empty($autor)){
        echo "Не введены все данные!";
        return;
    }
    $link = open_database_connection();
    $result = mysql_query("INSERT INTO `post`(`date`, `autor`, `title`, `content`) 
        VALUES ('$date','$autor','$title','$content')", $link);
    close_database_connection($link);

    return;
}