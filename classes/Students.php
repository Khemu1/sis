<?php
require_once ("DB.php");

class Students
{
  public static $table = "student";
  public static $columns = ["id", "userName", "name", "password", "address", "nationalId", "year"];

  /**
   * Inserts a new record into the Students table
   * - the entered array must an associative array -> key => value
   * - Please note: The array must be sorted like this -> id, userName, name, password, address, nationalId, year
   * @param array $data an associative array containing the column names as keys and their values
   * @return bool true if the record was inserted, false otherwise
   */
  public static function insert(array $data): bool
  {
    return DB::insert(self::$table, $data);
  }

}
