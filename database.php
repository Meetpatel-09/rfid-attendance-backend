<?php
class Database
{
     public $db;
     public function getConnection()
     {
          $this->db = null;
          try {
               $this->db = new mysqli('localhost', 'prince', 'Prince@123', 'rfid_db');
          } catch (Exception $e) {
               echo "Database could not be connected: " . $e->getMessage();
          }
          return $this->db;
     }
}