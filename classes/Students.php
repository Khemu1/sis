<?php
require_once ("DB.php");

class Students
{
  public static $table = "student";
  public static $columns = ["id", "userName", "name", "password", "address", "year"];

  /**
   * Returns all the rows of the table
   * @return array an associative array of rows
   */
  public static function selectAll(): array
  {
    return DB::selectAll(self::$table);
  }

  public static function select(array $columns, array $data): array
  {
    return DB::select(self::$table, $columns, $data);
  }
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
    $arr = array_combine(self::$columns, $data);

    return DB::insert(self::$table, $arr);
  }
}
