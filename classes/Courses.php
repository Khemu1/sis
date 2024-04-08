<?php
require_once ("DB.php");
class Courses
{

  public static $table = "course";
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
}