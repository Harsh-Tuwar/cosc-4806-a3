<?php
  class AccessLog {
    public function __construct() {
      
    }

    public function logAccess($username, $success) {
      $db = db_connect();
      $serverTimestamp = date('Y-m-d H:i:s');
      
      $query = 'INSERT INTO access_logs (username, success_attempt, timestamp) VALUES (:username, :success, :timestamp)';
      
      $stmt = $db->prepare($query);
      
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':success', $success);
      $stmt->bindParam(':timestamp', $serverTimestamp);
      $stmt->execute();
      
      return;
    }

    public function getLastLogByUsername($username) {
      $db = db_connect();
      $query = "SELECT * FROM access_logs 
                WHERE username = :username 
                AND success_attempt = 0
                ORDER BY timestamp DESC 
                LIMIT 1";

      $stmt = $db->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }  
