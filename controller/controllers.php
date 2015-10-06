<?php
// controller/controllers.php

function render_template($path, array $args)
{
    extract($args);
    ob_start();
    require $path;
    $html = ob_get_clean();

    return $html;
}

function list_action()
{
    $posts = get_all_posts();
    $html=render_template('view/templates/list.php',array('posts'=>$posts));
    return $html;
}

function show_action($id)
{
    $post = get_post_by_id($id);
    $html=render_template('view/templates/show.php',array('post'=>$post));
    return $html;
}
function admin_action()
{
	$html=render_template('view/templates/admin.php',array());
	return $html;
}
function add_action()
{
	add_new_post();
	$posts = get_all_posts();
    $html=render_template('view/templates/list.php',array('posts'=>$posts));
    return $html;
}