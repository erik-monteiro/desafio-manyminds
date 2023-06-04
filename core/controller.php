<?php

class Controller
{
    public function controllerName()
    {
        return get_class($this);
    }

    public function view($view, $data = [])
    {   
        extract($data);

        if (file_exists("views/" . $view . ".view.php")) {
            require ("views/" . $view . ".view.php");
        } else {
            echo "A view não existe!";
        }
    }

    public function load_model($model)
	{

		if(file_exists("models/" . ucfirst($model) . ".php")) {
			require("models/" . ucfirst($model) . ".php");
			return $model = new $model();
		}
		
		return false;
	}

	public function redirect($link)
	{
		header("Location: ". ROOT . "/".trim($link, "/"));
		die;
	}
}

?>