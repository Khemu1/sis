<?php

class DB
{
  private static $server = "localhost";
  private static $user = "root";
  private static $password = "";
  private static $database = "sis";
  public static PDO $pdo;
  /**
   * This function is used to initialize the database connection
   */
  public static function init()
  {
    try {
      // create a new PDO instance with the MySQL driver
      self::$pdo = new PDO(
        "mysql:host=" . self::$server . ";dbname=" . self::$database,
        self::$user,
        self::$password
      );
      // set the error mode to exception
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // set the default fetch mode to associative array
      self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      // print an error message if something goes wrong
      echo "Something is wrong with the database";
    }
  }

  /**
   * This function is used to insert data into a tables in the database
   * @param string $table the name of the table to insert into
   * @param array $data an array of key-value pairs where the key is the column name and the value is the value to insert
   * @return bool true if the data was inserted successfully, false otherwise
   */
  public static function insert(string $table, array $data): bool
  {
    $keys = array_keys($data);
    $placeholders = array_map(fn(string $key) => ":$key", $keys);
    $stmt = self::$pdo->prepare("
    INSERT INTO $table (" . implode(", ", $keys) . ") VALUES (" . implode(", ", $placeholders) . ")
    "); // used to prepare an SQL statement for execution
    return $stmt->execute($data); // this is used to exectue the perpare statement
  }
}