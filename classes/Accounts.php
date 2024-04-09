<?php
require_once ("DB.php");
class Accounts
{

  public static $table = "account";
  public static $columns = ["userName", "password",];

  /**
   * Inserts a new record into the account table
   * - accepts a 1D array
   * - the entered values of the array must be in this format ->  userName, password
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
  public static function select($columns, array $data): array
  {

    return DB::select(self::$table, $columns, $data);
  }
  public static function selectAll()
  {
    return DB::selectAll(self::$table);
  }

}
