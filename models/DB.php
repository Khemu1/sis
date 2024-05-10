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
   * @param string $table The name of the table to insert into
   * @param array $data An associative array
   * @return bool true if the data was inserted successfully, false otherwise
   */
  public static function insert(string $table, array $data): bool
  {
    $keys = array_keys($data);
    $placeholders = array_map(fn(string $key) => ":$key", $keys); 

    // Construct the SQL query
    // impolde turns the array into a string 
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
  public static function select($table, array $columns, array $data): array // id, user name , password --> [id=>value ,usernmae=>]
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
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result === false) {
      return [];
    }
    return $result;
  }

  /**
   * This function is used to select all data from a table in the database.
   *
   * @param string $table The name of the table to select from.
   *
   * @return array An array of associative arrays where each associative array represents a row of data.
   */
  public static function selectAll(string $table): array
  {
    $stmt = self::$pdo->prepare("SELECT * FROM $table");
    $stmt->execute(); // this is used to execute the prepare statement
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  /**
   * This function is used to update data in a table in the database.
   *
   * @param string $table The name of the table to update.
   * @param array $data An associative array where the key is the column name and the value is the new value to update.
   * @param array $condition An associative array where the key is the column name and the value is the value to match the rows to be updated.
   *
   * @return bool true if the data was updated successfully, false otherwise.
   */
  public static function update($table, $data, $condition): bool
  {
    $dataKeys = array_keys($data);
    $conditionKeys = array_keys($condition);

    $dataPlaceholders = array_map(function (string $key) {
      return "$key = :$key"; // username = 
    }, $dataKeys);
    $conditionPlaceholders = array_map(function (string $key) {
      return "$key = :$key";
    }, $conditionKeys);
    $sql = "UPDATE $table SET " . implode(", ", $dataPlaceholders) . " WHERE " . implode(" AND ", $conditionPlaceholders);

    try {
      $stmt = self::$pdo->prepare($sql);

      foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
      }

      foreach ($condition as $key => $value) {
        $stmt->bindValue(":$key", $value);
      }

      return $stmt->execute();
    } catch (\Throwable $th) {
      echo $th->getMessage();
      return false;
    }
  }

}
