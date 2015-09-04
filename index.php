<?php
print_r($_REQUEST);
require_once 'model/model.php';

require_once 'controller/controllers.php';

// Внутренняя маршрутизация
$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/') {
    list_action();
} elseif ($uri == '/show' && isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}

// include the HTML presentation code
require 'view/templates/list.php';