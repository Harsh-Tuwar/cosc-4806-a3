<?php
  class AccessLog {
    public function __construct() {
    }

    public function logAccess($username, $success) {
      $db = db_connect();
      $query = 'INSERT INTO access_logs (username, success_attempt, timestamp) VALUES (:username, :success)';
      $stmt = $db->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':success', $success);
      $statement->execute();
    }
  }  
