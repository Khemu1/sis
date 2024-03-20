<?php

class DB
{
  private static $server = "localhost";
  private static $user = "root";
  private static $password = "";
  private static $database = "sis";

  public static PDO $pdo;
  public static function init() { // this fucntions is used to connect to the the database
    try {
      self::$pdo = new PDO("nysql:host=". self::$server .";dbname=". self::$database,self::$user,self::$password);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      echo "Somthing is wrong with the database";
    }
  }

  public static function insert ($table, array $data) :bool{
    $keys = array_keys($data);
    $placeholders = array_map(fn(string $key) => ":$key", $keys);
    $stmt = self::$pdo->prepare("
    INSERT INTO $table (".implode(", ",$keys).") VALUES (".implode(", ",$placeholders)  .")
    ");
    return $stmt->execute($data);
  }
}