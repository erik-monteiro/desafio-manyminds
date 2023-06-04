<?php

class Home extends Controller
{
    public function index()
    {
        if (!Auth::loggedIn()) {
            $this->redirect('/login');
        }

        $user = new User();
        $data = $user->getAll();
        $numberOfUsers = count($data);
   
        return Controller::view('home', ['users' => $numberOfUsers, 'data' => $data]);
    }
}

?>