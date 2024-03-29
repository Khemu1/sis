<?php
require_once ("DB.php");
class Accounts
{

  public static $table = "account";
  public static $columns = ["userName", "password",];

  public static function insert(array $data): bool
  {
    if (count($data) != count(self::$columns)) {
      echo "invalid number of parameters:";
      return false;
    }
    $arr = array_combine(self::$columns,$data); // making the associative array
    
    return DB::insert(self::$table, $arr);
  }
}