<?php require_once ("DB.php");

class Teaches
{

    public static $table = 'teaches';
    public static $columns = ["teacherUserName", "course"];
    /**
     * Inserts a new record into the 'teaches' table.
     * - Must be called  when insereting teachers
     * @param array $data An associative array containing the data to be inserted.
     *                      The keys should match the column names in the 'teaches' table.
     * 
     * @return bool True if the insertion is successful, false otherwise.
     * 
     */
    public static function insert(array $data): bool
    {
        if (count($data) != count(self::$columns)) {
            echo "invalid number of parameters:";
            return false;
        }
        $arr = array_combine(self::$columns, $data);

        return DB::insert(self::$table, $arr);
    }
    /**
     * Selects teachers who teach a specific course based on the  given level.
     *
     * @param int $level The level of the students.
     *
     * @return array An associative array containing the distinct teacher usernames who teach at the specified level.
     * 
     * @throws PDOException If there is an error executing the SQL query.
     */
    public static function selectwithLevel(int $level): array
    {
        // Construct the SQL query
        $sql = "SELECT distinct teaches.teacherUserName AS teacherUserName
            FROM teaches
            JOIN course ON teaches.course = course.name
            JOIN student ON student.level = :level
            WHERE course.level = :level";

        // Prepare the SQL statement
        $stmt = DB::$pdo->prepare($sql);

        // Bind the level parameter
        $stmt->bindParam(':level', $level, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new PDOException("Error fetching data: " . $stmt->errorInfo()[2]);
        }
        return $result;
    }

    /**
     * Checks if a teacher teaches a specific course.
     *
     * @param array $data An associative array containing the teacher's username and the course name.
     *                      The keys should be "teacherUserName" and "course".
     *
     * @return int The number of rows returned by the query. If the teacher does not teach the course, it will return 0.
     */
    public static function doesTeach(array $data): int
    {
        $keys = array_keys($data);
        $placeholders = array_map(function (string $key) {
            return "$key= :$key";
        }, $keys);
        $sql = "SELECT COUNT(*) FROM " . self::$table . " WHERE  " . implode(" AND ", $placeholders) . " ";
        $stmt = DB::$pdo->prepare($sql);
        $stmt->execute($data);
        $count = $stmt->fetchColumn();
        return intval($count);
    }
}