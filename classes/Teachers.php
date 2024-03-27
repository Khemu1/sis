<?php
require_once ("DB.php");
class Teachers
{
  public static $table = "teacher";
  public static $columns = ["accountId", "userName", "name", "address", "nationalId", "course"];



  /**
   * Inserts a new record into the Students table
   * - The method only accepts 1D array
   * - The entered values of the array must be in this format -> accountId, userName, name, address, nationalId, course
   * - This method must be called along with the Course's method
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
}
