<?php
//route/routing.php
$s = explode('?',$_SERVER['REQUEST_URI']);
$uri=$s[0];
$uri=rtrim($uri,'/');
//echo "uri=$uri";
if ($uri == '/LinuxGitKurs/index.php' OR $uri == '/LinuxGitKurs') {
   $response=list_action();

} elseif ($uri == '/LinuxGitKurs/index.php/show' && isset($_GET['id'])) {
    $response=show_action($_GET['id']);

} elseif($uri=='/LinuxGitKurs/index.php/admin'){
	$response=admin_action();

} elseif($uri=='/LinuxGitKurs/index.php/add' && isset($_REQUEST['submit'])){
	$response=add_action();
	
} else {

    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}