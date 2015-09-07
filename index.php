<?php
//print_r($_REQUEST);
require_once 'model/model.php';

require_once 'controller/controllers.php';

// Внутренняя маршрутизация
$s = explode('?',$_SERVER['REQUEST_URI']);
$uri=$s[0];
//echo "uri=$uri";
if ($uri == '/LinuxGitKurs/index.php' OR $uri == '/LinuxGitKurs/') {
    list_action();
} elseif ($uri == '/LinuxGitKurs/index.php/show' && isset($_GET['id'])) {
    show_action($_GET['id']);
} elseif($uri=='/LinuxGitKurs/index.php/admin'){
	admin_action();
} elseif($uri=='/LinuxGitKurs/index.php/add' && isset($_REQUEST['submit'])){
	add_action();
} else {

    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}

