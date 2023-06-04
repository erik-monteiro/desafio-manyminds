<?php

class Users extends Controller
{
    public function index()
    {
        if (!Auth::loggedIn()) {
            $this->redirect('/login');
        }

        $user = new User();
        $data = $user->getAll();

        return Controller::view('users', ['data' => $data]);
    }

    public function add()
    {
        $errors = [];

        if (count($_POST) > 0) {
            $user = new User();

            if ($user->validateData($_POST)) {
                $_POST['status'] = 'active';
                $_POST['created_at'] = date('Y-m-d H:i:s');
    
                $user->insert($_POST);
                $this->redirect('/home');   
            } else {
                $errors = $user->errors;
            }
        }

        $this->view('users.add', ['errors' => $errors]);
    }

    public function edit($id = null)
    {
        $user = new User();

        if (count($_POST) > 0) {
            $_POST['updated_at'] = date('Y-m-d H:i:s');
            $user->update($id, $_POST);
            $this->redirect('users');
        }

        $rows = $user->where('id', $id);

        if ($rows) {
            $row = $rows[0]; // Acessar o primeiro objeto da coleção
            $this->view('users.edit', ['row' => $row]);  
        }        
    }


    public function delete($id = null)
    {
        $user = new User();

        if (count($_POST) > 0) {
            $user->delete($id);
            $this->redirect('users');
        }

        $row = $user->where('id', $id);
        if ($row) {
            $this->view('users.delete', ['row' => $row]);
        }
    }
}

?>