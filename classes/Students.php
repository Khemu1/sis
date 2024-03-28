<?php
require_once ("DB.php");

class Students
{
  public static $table = "student";
  public static $columns = ["id", "userName", "name", "password", "address", "nationalId", "year"];

  /**
   * Inserts a new record into the Students table
   * - the entered values of the array must be in this format -> accountId, userName, name, address, nationalId, course
   * @param array $data an  array containing the values
   * @return bool true if the record was inserted, false otherwise
   */
  public static function insert(array $data): bool
  {
    if (count($data) != count(self::$columns)) {
      echo "invalid number of parameters:";
      return false;
    }
    $arr = array_combine(self::$columns, $data); // making the associative array

    return DB::insert(self::$table, $arr);
  }

  public static function select(array $data): array
  {


    return DB::select(self::$table, $data);
  }
  public static function selectAll(array $data, array $columns)
  {
    return DB::selectAll(self::$table, $columns, $data);
  }
}
