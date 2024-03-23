<?php
require_once ("DB.php");
class Courses
{

  public static $table = "course";
  public static $columns = ["name", "level", "hours", "teacherAccountid"];
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