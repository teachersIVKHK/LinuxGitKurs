<?php 
class Router{
	public function __construct(){
		$arr=parse_url($this->_getURI());
		var_dump($arr);
	}
//получаем URI из всех возможных источников
	protected function _getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        if(!empty($_SERVER['PATH_INFO']))
        {
            return trim($_SERVER['PATH_INFO'], '/');
        }
        if(!empty($_SERVER['QUERY_STRING']))
        {
            return trim($_SERVER['QUERY_STRING'], '/');
        }
    }
    //парсим УРИ и получаем path и query
    private function getURI(){
    	$uri=_getURI();
    	 $arrURI=parse_url($uri);
    	 $path=$arrURI['path'];
    	 $arrPath=explode('/', $path);
    	 $n=count($arrPath);
    	 $controller=$arrPath[0];
    	 for($i=1;$i<n;$i++){
    	 	if($isset($arrPath[$i])){
    	 		
    	 	}

    	 }

    	 return;
    }
    public function run(){
    	$arrURI=$this->getPath();//получаем массив с разобранным URI
    	$action=strtolower($arrURI['path']).'_action()'; // формируем актион
    	$query=explode($arrURI['query']); //получаем массив с запросом
    }


}