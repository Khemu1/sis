<?php
require_once ("DB.php");
class Courses
{

  public static $table = "course";
<<<<<<< HEAD
  public static $columns = ["name", "level", "hours", "teacherAccountid"];
  /**
   * Inserts a new record into the course table
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
=======
  public static $columns = ["name", "level", "hours"];



  /**
 * Selects records from the Courses table based on the provided data.
 *
 * @param array $columns An array of column names to be selected.
 * @param array $data An array of conditions to filter the records.
 *
 * @return array An array of selected records.
 */
public static function select(array $columns, array $data): array
{
    return DB::select(self::$table, $columns, $data);
}
>>>>>>> 6267822f74bd8f51b82a21acf7c9fedcaae04622
}