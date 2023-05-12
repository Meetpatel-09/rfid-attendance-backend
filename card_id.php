<?php
class CardID
{
     // dbection
     private $db;
     // Table
     private $db_table = "card_id";
     // Columns
     public $id;
     public $card_id;
     public $result;

     // Db dbection
     public function __construct($db)
     {
          $this->db = $db;
     }

     // GET ALL
     public function getCardID()
     {
          $sqlQuery = "SELECT * FROM " . $this->db_table . "";
          $this->result = $this->db->query($sqlQuery);
          return $this->result;
     }

     // CREATE
     public function createCardID()
     {
          // sanitize
          $this->card_id = htmlspecialchars(strip_tags($this->card_id));
          $sqlQuery = "INSERT INTO `card_id` (`card_id`) VALUES ('". $this->card_id ."');";
          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }

     // UPDATE
     public function getSingleCardID()
     {
          $sqlQuery = "SELECT * FROM
" . $this->db_table . " WHERE id = " . $this->id;
          $record = $this->db->query($sqlQuery);
          $dataRow = $record->fetch_assoc();
          $this->card_id = $dataRow['card_id'];
     }

     // UPDATE
     public function updateCardID()
     {
          $this->card_id = htmlspecialchars(strip_tags($this->card_id));
          $this->id = htmlspecialchars(strip_tags($this->id));

          $sqlQuery = "UPDATE " . $this->db_table . $this->card_id . "'
WHERE id = " . $this->id;

          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }

     // DELETE
     function deleteCardID()
     {
          $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE card_id = " . $this->card_id;
          $this->db->query($sqlQuery);
          if ($this->db->affected_rows > 0) {
               return true;
          }
          return false;
     }
}
?>