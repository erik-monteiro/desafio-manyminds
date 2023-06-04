<?php

class Login extends Controller
{
    public function index()
    {
        $errors = [];
        
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $ipAddress = $_SERVER['REMOTE_ADDR'];

            if (!empty($email) && !empty($password)) {
                $user = new User();

                $query = "SELECT * FROM users WHERE email = :email AND password = :password";
                $data = [
                    'email' => $email,
                    'password' => $password
                ];
                $result = $user->query($query, $data);

                if ($result) {
                    Auth::authenticate($email);
                    $this->redirect('/home');
                } else {
                    $this->registerFailedLoginAttempt($ipAddress); 
                    if ($this->checkLoginAttempts($ipAddress)) {
                        $errors['ipBlocked'] = "IP BLOQUEADO: você errou as credenciais muitas vezes. Tente novamente em 1 minuto.";
                    } else {
                        $errors['logginFailed'] = "Email ou senha incorretos!";
                    }
                }
            } else {
                $errors['emptyField'] = "Email ou senha não preenchidos!";
            }
        }

        return Controller::view('login', ['errors' => $errors]);
    }

    public function checkLoginAttempts($ipAddress)
    {
        if ($ipAddress != null) {
            $user = new User();
            $maxAttempts = 3;
            $blockDuration = 1;
            $blockTime = date('Y-m-d H:i:s', strtotime("-$blockDuration minute"));

            $query = "SELECT COUNT(*) as num_attempts FROM login_attempts WHERE ip_address = :ip AND attempt_time > :block_time";
            $data = [
                ':ip' => $ipAddress,
                ':block_time' => $blockTime
            ];
            $result = $user->query($query, $data);

            if ($result && $result[0]->num_attempts >= $maxAttempts) {
                return true;
            }
        }
        
        return false;
    }


    public function registerFailedLoginAttempt($ipAddress)
    {
        if ($ipAddress != null) {
            $user = new User();

            $query = "INSERT INTO login_attempts (ip_address) VALUES (:ip)";
            $data = [':ip' => $ipAddress];
            $user->query($query, $data);
        }
    }
}

?>
