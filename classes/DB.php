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
    echo print_r($data);
    $keys = array_keys($data);
    $placeholders = array_map(fn(string $key) => ":$key", $keys);

    // Construct the SQL query
    $sql = "INSERT INTO $table (" . implode(", ", $keys) . ") VALUES (" . implode(", ", $placeholders) . ")";

    // Prepare the SQL statement
    $stmt = self::$pdo->prepare($sql);

    try {
      // Execute the statement
      return $stmt->execute($data);
    } catch (PDOException $e) {
      // Handle the exception
      echo "Execution failed: " . $e->getMessage() . "<br>";
      return false;
    }
  }

  /**
   * This function is used to select specific data from a table in the database
   *
   * @param string $table the name of the table to select from
   * @param array $columns an array of column names to select
   * @param array $data an array of key-value pairs where the key is the column name and the value is the value to match
   * @return array an array of associative arrays where each associative array represents a row of data
   */
  public static function select($table, array $columns, array $data): array
  {
    $keys = array_keys($data);
    $placeholders = array_map(fn(string $key) => "$key= :$key", $keys);

    // Construct the SQL query
    $sql = "SELECT " . implode(", ", $columns) . " FROM $table WHERE " . implode(" AND ", $placeholders);

    // Prepare the SQL statement
    $stmt = self::$pdo->prepare($sql);

    // Execute the statement
    $stmt->execute($data);

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result === false) {
      return [];
    }
    return $result;
  }

  /**
   * This function is used to select all data from a tables in the database
   *
   * @param string $table the name of the table to select from
   * @return array an array of associative arrays where each associative array represents a row of data
   */
  public static function selectAll($table): array
  {
    $stmt = self::$pdo->prepare("SELECT * FROM $table");
    $stmt->execute(); // this is used to exectue the perpare statement
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}