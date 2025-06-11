<?php

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }

    public function new_account() {
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];

      $user = $this->model('User');
      $user->create($username, $password);
    }
}
