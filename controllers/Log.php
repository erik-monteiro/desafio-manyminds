<?php

class Log extends Controller
{
    public function index()
    {
        if (!Auth::loggedIn()) {
            $this->redirect('/login');
        }

        $user = new User();
        $dataUser = $user->getAll();
        $logs = $this->getLoginAttempts();
        

        return Controller::view('log', ['dataUser' => $dataUser, 'logs' => $logs]);
    }

    public function getLoginAttempts()
    {
        $user = new User();
        $query = "SELECT * FROM login_attempts";
        $logs = $user->query($query);
        return $logs;
    }
}

?>