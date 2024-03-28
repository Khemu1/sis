<?php
require_once ("DB.php");
class Courses
{

  public static $table = "course";
  public static $columns = ["name", "level", "hours", "teacherAccountid"];
  /**
   * Inserts a new record into the Students table
   * - The method only accepts 1D array
   * - The entered values of the array must be in this format ->  name , level , hours , teacher's account id
   * - This method must be called along the Teacher's method
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