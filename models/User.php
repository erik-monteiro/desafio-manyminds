<?php

class User extends Model
{
    public function validateData($data, $id = '')
    {
        $this->errors = [];

        if (empty($data['name']) || empty($data['email']) || empty($data['password']) || empty($data['address']) || empty($data['cep']) || empty($data['city'])) {
            $this->errors['emptyFields'] = 'Todos os campos devem ser preenchidos';
            return false;
        }        

        return true;
    }
}

?>