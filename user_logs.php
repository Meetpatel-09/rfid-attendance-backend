<?php
class UserLogs
{
     // dbection
     private $db;
     // Table
     private $db_table = "user_logs";
     // Columns
     public $id;
     public $card_id;
     // public $name;
     public $entry_time;
     public $exit_time;
     public $result;

     // Db dbection
     public function __construct($db)
     {
          $this->db = $db;
     }

     // GET ALL
     public function getUserLogs()
     {
          // $sqlQuery = "SELECT * FROM " . "$this->db_table" . "";
          $sqlQuery = "SELECT user_logs.*, users_tbl.name FROM rfid_db.user_logs JOIN rfid_db.users_tbl WHERE user_logs.card_id = users_tbl.card_id";
          $this->result = $this->db->query($sqlQuery);
          return $this->result;
     }

     // CREATE
     public function addUserLog()
     {
          // sanitize
          $this->card_id = htmlspecialchars(strip_tags($this->card_id));

          $sqlQuery = "SELECT * FROM `users_tbl` WHERE card_id = " . $this->card_id;
          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE card_id = " . $this->card_id;
               $this->db->query($sqlQuery);
               if ($this->db->affected_rows > 0) {
                    $this->card_id = htmlspecialchars(strip_tags($this->card_id));
                    $this->exit_time = date("Y-m-d H:i:s", strtotime('+3 hours +30 minutes'));

                    $sqlQuery = "UPDATE " . $this->db_table . " SET exit_time = '" . $this->exit_time . "'
                    WHERE card_id = " . $this->card_id;
                    $this->db->query($sqlQuery);
                    if ($this->db->affected_rows > 0) {
                         return true;
                    }
                    return false;
               } else {
                    $this->card_id = htmlspecialchars(strip_tags($this->card_id));
                    $this->entry_time = date("Y-m-d H:i:s", strtotime('+3 hours +30 minutes'));
                    $this->exit_time = "";
                    $sqlQuery = "INSERT INTO $this->db_table (`card_id`, `entry_time`) VALUES ('" . $this->card_id . "','" . $this->entry_time . "');";
                    $this->db->query($sqlQuery);
                    if ($this->db->affected_rows > 0) {
                         return true;
                    }
                    return false;
               }
          } else {
               return false;
          }

          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }

     // UPDATE
     //      public function getSingleUsers()
     //      {
     //           $sqlQuery = "SELECT * FROM
     // " . $this->db_table . " WHERE id = " . $this->id;
     //           $record = $this->db->query($sqlQuery);
     //           $dataRow = $record->fetch_assoc();
     //           $this->card_id = $dataRow['card_id'];
     //           $this->name = $dataRow['name'];
     //           // $this->email = $dataRow['email'];
     //           // $this->mobile = $dataRow['mobile'];
     //      }

     //      // UPDATE
     // public function updateUsers()
     // {
     //      $this->card_id = htmlspecialchars(strip_tags($this->card_id));
     //      $this->name = htmlspecialchars(strip_tags($this->name));
     //      // $this->email = htmlspecialchars(strip_tags($this->email));
     //      // $this->mobile = htmlspecialchars(strip_tags($this->mobile));
     //      $this->id = htmlspecialchars(strip_tags($this->id));

     //                $sqlQuery = "UPDATE " . $this->db_table . " SET name = '" . $this->name . "',
     //      email = '" . $this->email . "',
     //      mobile = '" . $this->mobile . "',card_id = '" . $this->card_id . "'
     //      WHERE id = " . $this->id;

     // $this->db->query($sqlQuery);
     // if ($this->db->affected_rows > 0) {
     //      return true;
     // }
     // return false;
     // }

     // DELETE
     function deleteUsers()
     {
          $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }
}