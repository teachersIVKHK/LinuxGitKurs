<?php
//route/routing.php
$controller=new Controllers();
$router=new Router();
$s = explode('?',$_SERVER['REQUEST_URI']);
$uri=trim($s[0],'/');
// $uri=$_SERVER['REQUEST_URI'];
// $arrURI=parse_url($uri);
// $path=trim($arrURI['path'],'/');
// $arrPath=explode('/',$path);
// $controller=($arrPath[0]);
// if(isset($arrPath[1])){
// 	$action=$arrPath[1].'_action()';
// }
// if(isset($arrPath[2])){

// }
echo "<br>uri=$uri";
if ($uri == '') {
    $controller->list_action();

} elseif ($uri == 'show' && isset($_GET['id'])) {
    $controller->show_action($_GET['id']);

} elseif($uri == 'admin'){
	$controller->admin_action();

} elseif($uri=='add' && isset($_REQUEST['submit'])){
	$controller->add_action();
	
} elseif($uri=='delete'){
	$controller->delete_action();
	
}else {

    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}