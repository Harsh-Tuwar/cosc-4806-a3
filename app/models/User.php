<?php

require_once 'app/models/AccessLog.php';

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function test () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return $rows;
    }
  
    public function authenticate($username, $password) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
    		$username = strtolower($username);
    		$db = db_connect();
        $access_log = new AccessLog();
      
        $statement = $db->prepare("select * from users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
      
    		if (password_verify($password, $rows['password'])) {
    			$_SESSION['auth'] = 1;
    			$_SESSION['username'] = ucwords($username);
    			unset($_SESSION['failedAuth']);
          $access_log->logAccess($username, 1);
    			header('Location: /home');
    			die;
    		} else {
    			if(isset($_SESSION['failedAuth'])) {
    				$_SESSION['failedAuth'] ++; //increment
    			} else {
    				$_SESSION['failedAuth'] = 1;
    			}
          $access_log->logAccess($username, 0);
          $_SESSION['login_error'] = "Invalid username or password. Failed attempts: " . $_SESSION['failedAuth'] . ".";
    			header('Location: /login');
          die;
    		}
    }

    public function create($username, $password) {
      $lwr_username = strtolower($username);
      $db = db_connect();

      // Check if username already exists
      $checkQuery = 'SELECT COUNT(*) FROM users WHERE username = :username';
      $checkStmt = $db->prepare($checkQuery);
      $checkStmt->bindParam(':username', $lwr_username);
      $checkStmt->execute();

      if ($checkStmt->fetchColumn() > 0) {
          $_SESSION['signup_error'] = "Username already exists.";
          header('Location: /create');
          die;
      }

      // Validate password strength
      if (!$this->is_valid_password($password)) {
        $_SESSION['signup_error'] = "Password must be at least 8 characters long and include uppercase, lowercase, digit, and special character.";
        header('Location: /create');
        die;
      }

      // Hash the password securely
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Insert new user
      $query = 'INSERT INTO users (username, password) VALUES (:username, :password)';
      $stmt = db->prepare($query);
      $stmt->bindParam(':username', $lwr_username);
      $stmt->bindParam(':password', $hashedPassword);

      if ($stmt->execute()) {
        header('Location: /login');
        unset($_SESSION['signup_error']);
        die;
      } else {
          $_SESSION['signup_error'] = "Error createing account. Probably a server error. Try again later.";
          header('Location: /create');
          die;
      }      
    }
  
    // Helper function for password validation
    private function is_valid_password($password) {
      $minLength = 8;
      return (
          strlen($password) >= $minLength &&
          preg_match('/[A-Z]/', $password) &&    // At least one uppercase
          preg_match('/[a-z]/', $password) &&    // At least one lowercase
          preg_match('/[0-9]/', $password) &&    // At least one digit
          preg_match('/[\W]/', $password)        // At least one special char
      );
    }
}
