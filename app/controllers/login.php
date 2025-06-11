<?php

class Login extends Controller {

    public function index() {		
	    $this->view('login/index');
    }
    
    public function verify(){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
		
			$user = $this->model('User');
			$access_log = $this->model('AccessLog');
			
			$success_attempt = $user->authenticate($username, $password);

			$access_log->logAccess($username, $success_attempt);
			
			if ($success_attempt === 1) {
				header('Location: /home');
			} else {
				header('Location: /login');
			}			
    }
}
