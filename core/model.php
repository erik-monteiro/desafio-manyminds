<?php

class Model extends Database
{
    public $errors = [];

    public function __construct()
	{
		if(!property_exists($this, 'table')) {
			$this->table = strtolower($this::class) . "s";
		}
	}

    public function getAll()
    {   
        $query = "SELECT * FROM $this->table";
        $data = $this->query($query);

        return $data;
    }

    public function where($column, $value)
    {
        $column = addslashes($column);
        $query = "SELECT * FROM $this->table WHERE $column = :value";
        $data = $this->query($query, [
            'value' => $value
        ]);

        return $data;
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $columns = implode(",", $keys);
        $values = implode(",:", $keys);

        $query = "INSERT INTO  $this->table ($columns) VALUES (:$values)";
        return Database::query($query, $data);
    }

    public function update($id, $data)
    {
        $str = "";
		foreach ($data as $key => $value) {
			$str .= $key. "=:". $key.",";
		}

		$str = trim($str,",");
 
		$data['id'] = $id;
		$query = "update $this->table set $str where id = :id";

		return $this->query($query, $data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $data['id'] = $id;
        return Database::query($query, $data);
    }
    

}

?>