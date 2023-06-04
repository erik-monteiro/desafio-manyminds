<?php

function get_var($key,$default = "",$method = "post")
{

	$data = $_POST;
	if($method == "get")
	{
		$data = $_GET;
	}

	if(isset($data[$key]))
	{
		return $data[$key];
	}

	return $default;
}

function get_select($key, $value)
{
	if(isset($_POST[$key]))
	{
		if($_POST[$key] == $value)
		{
			return "selected";
		}
	}

	return "";
}



?>