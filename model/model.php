<?php
// model.php

function open_database_connection()
{
    $link = mysql_connect('localhost', 'root', '12345');
    mysql_select_db('mcvblog', $link);
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

    $result = mysql_query("SELECT `title`,`text`,`autor`,`date` FROM post WHERE `id`='$id'"), $link);
    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }
    close_database_connection($link);

    return $posts;
}