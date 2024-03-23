<?php
require_once ("DB.php");
class Teachers
{
  public static $table = "teacher";
  public static $columns = ["id", "userName", "name", "password", "address", "nationalId", "courses"];



  /**
   * Returns all the specified columns of the table
   * @return array an associative array of rows
   */
  public static function select(array $columns,array $data): array
  {
    return DB::select(self::$table,$columns,$data);
  }
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
