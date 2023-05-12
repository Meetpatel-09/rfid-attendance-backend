<?php
class Admin
{
     // dbection
     private $db;
     // Table
     private $db_table = "admin";
     // Columns
     public $id;
     public $email;
     public $password;
     public $result;

     // Db dbection
     public function __construct($db)
     {
          $this->db = $db;
     }

     // // GET ALL
     // public function getEmployees()
     // {
     //      $sqlQuery = "SELECT id, name, email, designation, created FROM " . $this->db_table . "";
     //      $this->result = $this->db->query($sqlQuery);
     //      return $this->result;
     // }

//      // CREATE
//      public function createEmployee()
//      {
//           // sanitize
//           $this->name = htmlspecialchars(strip_tags($this->name));
//           $this->email = htmlspecialchars(strip_tags($this->email));
//           $this->designation = htmlspecialchars(strip_tags($this->designation));
//           $this->created = htmlspecialchars(strip_tags($this->created));
//           $sqlQuery = "INSERT INTO
// " . $this->db_table . " SET name = '" . $this->name . "',
// email = '" . $this->email . "',
// designation = '" . $this->designation . "',created = '" . $this->created . "'";
//           $this->db->query($sqlQuery);
//           if ($this->db->affected_rows > 0) {
//                return true;
//           }
//           return false;
//      }

     // single
     public function getSingleEmployee()
     {
          $sqlQuery = "SELECT * FROM
" . $this->db_table . " WHERE email = " . $this->id;
          $record = $this->db->query($sqlQuery);
          $dataRow = $record->fetch_assoc();
          $this->email = $dataRow['email'];
          // $this->designation = $dataRow['designation'];
          // $this->created = $dataRow['created'];
     }

//      // single
//      public function getSingleEmployee()
//      {
//           $sqlQuery = "SELECT id, name, email, designation, created FROM
// " . $this->db_table . " WHERE id = " . $this->id;
//           $record = $this->db->query($sqlQuery);
//           $dataRow = $record->fetch_assoc();
//           $this->name = $dataRow['name'];
//           $this->email = $dataRow['email'];
//           $this->designation = $dataRow['designation'];
//           $this->created = $dataRow['created'];
//      }
// 
//      // UPDATE
//      public function updateEmployee()
//      {
//           $this->name = htmlspecialchars(strip_tags($this->name));
//           $this->email = htmlspecialchars(strip_tags($this->email));
//           $this->designation = htmlspecialchars(strip_tags($this->designation));
//           $this->created = htmlspecialchars(strip_tags($this->created));
//           $this->id = htmlspecialchars(strip_tags($this->id));

//           $sqlQuery = "UPDATE " . $this->db_table . " SET name = '" . $this->name . "',
// email = '" . $this->email . "',
// designation = '" . $this->designation . "',created = '" . $this->created . "'
// WHERE id = " . $this->id;

//           $this->db->query($sqlQuery);
//           if ($this->db->affected_rows > 0) {
//                return true;
//           }
//           return false;
//      }

     // // DELETE
     // function deleteEmployee()
     // {
     //      $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
     //      $this->db->query($sqlQuery);
     //      if ($this->db->affected_rows > 0) {
     //           return true;
     //      }
     //      return false;
     // }
}
?>