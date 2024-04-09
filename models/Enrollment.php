<?php
require_once ("DB.php");
require_once ("Students.php");
require_once ("Teachers.php");
require_once ("Courses.php");
require_once ("Teaches.php");


class Enrollment
{

  public static $table = "enrollment";
  public static $columns = ["courseName", "studentUserName", "teacherUserName"];

  /**
   * - should be called upon any registration process
   * Enrolls students in courses based on their level and available teachers.
   */
  public static function enroll(): void
  {
    $students = Students::selectAll();

    if (empty($students)) {
      return;
    }

    foreach ($students as $student) {
      $studentLevel = $student["level"];
      $courses = Courses::select(["name"], ["level" => $studentLevel]);
      $teachers = Teaches::selectWithLevel($studentLevel);
      $coursesForLevel = Courses::select(["name"], ["level" => $studentLevel]);
      $unassinged = true;
      $teacherFound = false;

      foreach ($courses as $course) {
        if (empty($teachers)) {
          self::insert($course["name"], $student["userName"], null);
          continue;
        }

        foreach ($teachers as $teacher) {
          // Check if the teacher teaches the current course and has available slots for the student

          $isTeachingCourse = Teaches::doesTeach(["teacherUserName" => $teacher["teacherUserName"], "course" => $course["name"]]) === 1;
          $teacherCourseCount = self::exists(["teacherUserName" => $teacher["teacherUserName"], "courseName" => $course["name"]]) < 5;
          $alreadyEnrolled = self::exists(["teacherUserName" => $teacher["teacherUserName"], "studentUserName" => $student["userName"], "courseName" => $course["name"]]) === 0;
          $studentCourseCount = self::exists(["studentUserName" => $student["userName"]]) < count($coursesForLevel);
          ;
          if (!$isTeachingCourse)
            continue;
          if (!$teacherCourseCount)
            continue;
          if (!$alreadyEnrolled)
            break;
          if (!$studentCourseCount)
            break;
          $teacherFound = true;

          if ($teacherFound) {

            self::insert($course["name"], $student["userName"], $teacher["teacherUserName"]);
            $unassinged = false;
          }
          if (!$teacherFound) {
            self::insert($course["name"], $student["userName"], null);
          }
        }
      }

      // Update the null course names
      if ($unassinged && !empty($teachers)) {
        $nullCourses = self::selectNull(["courseName"], ["studentUserName" => $student["userName"]]);
        if (!empty($nullCourses)) {
          foreach ($nullCourses as $nullCourse) {

            foreach ($teachers as $teacher) {
              echo print_r($teacher) . "<br>";
              $isTeachingCourse = Teaches::doesTeach(["teacherUserName" => $teacher["teacherUserName"], "course" => $nullCourse["courseName"]]) === 1;
              $teacherCourseCount = self::exists(["teacherUserName" => $teacher["teacherUserName"], "courseName" => $nullCourse["courseName"]]) < 5;
              $alreadyEnrolled = self::exists(["teacherUserName" => $teacher["teacherUserName"], "studentUserName" => $student["userName"], "courseName" => $nullCourse["courseName"]]) === 0;

              if (!$isTeachingCourse)
                continue;
              if (!$teacherCourseCount)
                continue;
              if (!$alreadyEnrolled)
                break;

              self::update(["teacherUserName" => $teacher["teacherUserName"]], ["studentUserName" => $student["userName"], "courseName" => $nullCourse["courseName"]]);
              echo "updated the null value";
              break;
            }
          }
        }
      }

    }
  }



  /**
   * Inserts a new enrollment record into the database.
   *
   * @param string $course The name of the course to be enrolled.
   * @param string $studentUserName The username of the student to be enrolled.
   * @param string $teacherUserName The username of the teacher who will teach the course.
   *
   * @return bool True if the record is successfully inserted, false otherwise.
   */
  public static function insert(string $course = null, string $studentUserName, string $teacherUserName = null): bool
  {
    $sql = "INSERT INTO " . self::$table . "(courseName, studentUserName, teacherUserName) VALUES (?, ?, ?)";

    try {
      $stmt = DB::$pdo->prepare($sql);
      return $stmt->execute([$course, $studentUserName, $teacherUserName]);
    } catch (\Throwable $th) {
      echo $th->getMessage();
      return false;
    }
  }


  /**
 * Updates an existing enrollment record in the database.
 *
 * @param array $columns An associative array containing the new values for the columns to be updated.
 * @param array $data An associative array containing the data to search for the record to be updated.
 *
 * @return bool True if the record is successfully updated, false otherwise.
 */
public static function update(array $columns, array $data): bool
{
    // Use the DB class to execute the UPDATE query
    return DB::update(self::$table, $columns, $data);
}

  /**
 * Selects records from the enrollment table based on the given columns and data.
 *
 * @param array $columns An associative array containing the columns to be selected from the table.
 * @param array $data An associative array containing the data to search for the records.
 *
 * @return array An associative array containing the selected records.
 */
public static function select(array $columns, array $data): array
{
    return DB::select(self::$table, $columns, $data);
}
  /**
 * Selects records from the enrollment table based on the given columns and data,
 * where the teacherUserName is null.
 *
 * @param array $columns An associative array containing the columns to be selected from the table.
 * @param array $data An associative array containing the data to search for the records.
 *
 * @return array An associative array containing the selected records.
 */
public static function selectNull(array $columns, array $data): array
{
    $keys = array_keys($data);
    $placeholders = array_map(function (string $key) {
        return "$key= :$key";
    }, $keys);

    $sql = "SELECT " . implode(", ", $columns) . " FROM " . self::$table . " WHERE teacherUserName is null AND " . implode(" AND ", $placeholders);

    $stmt = DB::$pdo->prepare($sql);

    $stmt->execute($data);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result === false) {
        return [];
    }
    return $result;
}
  /**
   * Checks if a record with the given data already exists in the database.
   *
   * @param array $data An associative array containing the data to search for in the database.
   * @return int The number of matching records in the database.
   */
  public static function exists(array $data): int
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

