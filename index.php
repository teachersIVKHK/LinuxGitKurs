<?php
function __autoload($class_name) {
	//class directories
        $directorys = array(
            'controller/',
            'model/',
            'route/'  
        );
        
        //for each directory
        foreach($directorys as $directory)
        {
            //see if the file exsists
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                //only require the class once, so quit after to save effort (if you got more, then name them something else 
                return;
            }            
        }
}
// Загружаем бизнес логику, которая работает с базой (модель)
//require_once 'model/model.php';
// Загружаем функции получающие данные из модели и отдающие представлению (виду)
//require_once 'controller/controllers.php';
// Загружаем функции обработки запросов и инициации соответствующих контроллеров
require_once 'route/routing.php';

