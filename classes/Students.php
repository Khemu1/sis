<?php
require_once ("DB.php");

class Students
{
  public static $table = "student";
  public static $columns = ["accountId", "userName", "name", "address", "level"];
<<<<<<< HEAD


  /**
   * Inserts a new record into the student table
   * - Accepts a 1D array
   * - The entered values of the array must be in this format -> accountId, userName, name, address , level
=======

  /**
   * Returns all the rows of the table
   * @return array an associative array of rows
   */
  public static function selectAll(): array
  {
    return DB::selectAll(self::$table);
  }

  /**
 * Selects rows from the Students table based on the provided columns and data.
 *
 * @param array $columns An array of columns to be selected from the table.
 * @param array $data An associative array of data to be used for filtering or sorting the results.
 *
 * @return array An associative array of rows matching the provided criteria.
 */
public static function select(array $columns, array $data): array
{
    return DB::select(self::$table, $columns, $data);
}
  /**
   * Inserts a new record into the Students table
   * - the entered values of the array must be in this format -> accountId, userName, name, address,level
>>>>>>> 6267822f74bd8f51b82a21acf7c9fedcaae04622
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
