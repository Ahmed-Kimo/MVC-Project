<?php 
define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",dirname(__DIR__).DS);
define("APP",ROOT_PATH.'app'.DS);
define("CONFIG",APP.'config'.DS);
define("CONTROLLER",APP.'controllers'.DS);
define("CORE",APP.'core'.DS);
define("LIBS",APP.'libs'.DS);
define("MODELS",APP.'models'.DS);
define("VIEWS",APP.'views'.DS);
define("UPLOAD",ROOT_PATH.'public'.DS.'uploads'.DS);


require_once(CONFIG.'config.php');
require_once(CONFIG.'helpers.php');

$modules= [ROOT_PATH,APP,CONFIG,CONTROLLER,CORE,MODELS,VIEWS,UPLOAD];
set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload');