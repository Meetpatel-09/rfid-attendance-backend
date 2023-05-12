<?php
class users_tbl
{
     // dbection
     private $db;
     // Table
     private $db_table = "users_tbl";
     // Columns
     public $id;
     public $card_id;
     public $name;
     public $email;
     public $mobile;
     public $result;

     // Db dbection
     public function __construct($db)
     {
          $this->db = $db;
     }

     // GET ALL
     public function getusers_tbl()
     {
          $sqlQuery = "SELECT * FROM " . $this->db_table . "";
          $this->result = $this->db->query($sqlQuery);
          return $this->result;
     }

     // CREATE
     public function createUser()
     {
          // sanitize
          $this->card_id = htmlspecialchars(strip_tags($this->card_id));
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->mobile = htmlspecialchars(strip_tags($this->mobile));
          $sqlQuery = "INSERT INTO `users_tbl`(`card_id`, `name`, `email`, `mobile`) VALUES ('" . $this->card_id . "','" . $this->name . "','" . $this->email . "','" . $this->mobile . "');";
//           $sqlQuery = "INSERT INTO
// " . $this->db_table . "SET card_id = '" . $this->card_id . "', name = '" . $this->name . "', email = '" . $this->email . "', email = '" . $this->email . "', mobile = '" . $this->mobile . "'";
          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }

     // UPDATE
     public function getSingleusers_tbl()
     {
          $sqlQuery = "SELECT * FROM
" . $this->db_table . " WHERE id = " . $this->id;
          $record = $this->db->query($sqlQuery);
          $dataRow = $record->fetch_assoc();
          $this->card_id = $dataRow['card_id'];
          $this->name = $dataRow['name'];
          $this->email = $dataRow['email'];
          $this->mobile = $dataRow['mobile'];
     }

     // UPDATE
     public function updateusers_tbl()
     {
          $this->card_id = htmlspecialchars(strip_tags($this->card_id));
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->mobile = htmlspecialchars(strip_tags($this->mobile));
          $this->id = htmlspecialchars(strip_tags($this->id));

          $sqlQuery = "UPDATE " . $this->db_table . " SET name = '" . $this->name . "',
email = '" . $this->email . "',
mobile = '" . $this->mobile . "',card_id = '" . $this->card_id . "'
WHERE id = " . $this->id;

          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }

     // DELETE
     function deleteusers_tbl()
     {
          $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }
}
?>