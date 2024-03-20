<?php
require_once ("DB.php");
class Students
{
  public static $table = "student";
  public static $columns = ["id", "name", "address", "nationalId", "year"];

  public static function insert(array $data): bool
  {
    return DB::insert(self::$table, $data);
  }

}
