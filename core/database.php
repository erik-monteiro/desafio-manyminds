<?php

class Database
{
    public function connect()
    {
        $string = "mysql:host=" . SERVER_NAME . ";dbname=" . DBNAME;

        if (!$conn = new PDO($string, USERNAME, PASSWORD)){
            echo "Não foi possível conectar com o banco de dados!";
        } else {
            $query = "CREATE DATABASE IF NOT EXISTS " . DBNAME;
            $conn->exec($query);
            $conn->exec("USE " . DBNAME);
        
            $query = "SHOW TABLES LIKE 'users'";
            $result = $conn->query($query);

            if ($result->rowCount() == 0) {
                $query = "CREATE TABLE users (
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(40) NOT NULL,
                            email VARCHAR(50) NOT NULL,
                            password VARCHAR(50) NOT NULL,
                            status ENUM('active', 'not_active') NOT NULL DEFAULT 'active',
                            address VARCHAR(100) NOT NULL,
                            cep VARCHAR(9) NOT NULL,
                            city VARCHAR(40) NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            updated_at TIMESTAMP DEFAULT NULL
                        )";
                $conn->exec($query);

                $query = "INSERT INTO users 
                    (name, email, password, status, address, cep, city, created_at, updated_at) 
                    VALUES 
                    ('Erik', 'erik@hotmail.com', '123', 'active', 'Endereço teste', '95322999', 'Porto Alegre', NOW(), null)";
                $conn->exec($query);

                $query = "CREATE TABLE login_attempts (
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            ip_address VARCHAR(50),
                            attempt_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        )";
                $conn->exec($query);
            }
        }
        return $conn;
    }

    public function query($query, $data = array(), $data_type = "object")
	{
		$conn = $this->connect();
		$stm = $conn->prepare($query);

		$result = false;
		if ($stm) {
			$check = $stm->execute($data);
			if ($check) {
				if($data_type == "object"){
					$result = $stm->fetchAll(PDO::FETCH_OBJ);
				}else{
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}
 
 			}
		}

		if(is_array($result) && count($result) >0){
			return $result;
		}

		return false;
	}
}

?>