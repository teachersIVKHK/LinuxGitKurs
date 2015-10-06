<?php
error_reporting('E_ALL | E_STRICT');
ini_set('display_errors', 1);
// Загружаем бизнес логику, которая работает с базой (модель)
require_once 'model/model.php';
// Загружаем функции получающие данные из модели и отдающие представлению (виду)
require_once 'controller/controllers.php';
// Загружаем функции обработки запросов и инициации соответствующих контроллеров
require_once 'route/routing.php';

echo $response;

