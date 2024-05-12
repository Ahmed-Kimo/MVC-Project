<?php 
    class App{
        protected $controller = "HomeController";
        protected $action = "index";
        protected $params = [];

        public function __construct()
        {
           $this->PrepareUrl();
           $this->render();
        }

        private function PrepareUrl(){
            $url = $_SERVER['QUERY_STRING'];
            if (!empty($url)){
                $url = trim($url,"/");
                $url = explode("/",$url);
                //Set the Controller 
                $this->controller = isset($url[0])? ucwords($url[0])."Controller":"HomeController";
                //Set the Action
                $this->action = isset($url[1])? ucwords($url[1]):"index";
                unset($url[0],$url[1]);
                $this->params = !empty($url)? array_values($url):[];

            }
        }

        private function render(){
            if (class_exists($this->controller)){
                $controller = new $this->controller;
                if (method_exists($controller,$this->action)){
                    
                    call_user_func_array([$controller,$this->action],$this->params);
                }
                else{
                    echo "Method not exists";
                }

            }
            else {
                echo "This Controller : ".$this->controller." is not exist";
            }
        }
    }


?>