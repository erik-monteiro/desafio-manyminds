<?php

class App
{
    protected $controller = "login";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $pageURL = $this->getURL();

        if (file_exists("controllers/" . $pageURL[0] . ".php")) {
            $this->controller = ucfirst($pageURL[0]);
            unset($pageURL[0]);
        } else {
            echo "Controller não encontrado";      
        }

        require "controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller();
        
        if (isset($pageURL[1])) {
            if (method_exists($this->controller, $pageURL[1])) {
                $this->method = ucfirst($pageURL[1]);
                unset($pageURL[1]);
            }
        }

        $pageURL = array_values($pageURL);
		$this->params = $pageURL;
		
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getURL() {
        $url = isset($_GET['url']) ? $_GET['url'] : "login";
		return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL);
    }
}

?>


<?php



