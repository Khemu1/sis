<?php
require_once ("DB.php");
require_once ("Students.php");
require_once ("Teachers.php");
require_once ("Courses.php");


class Enrollment
{

  public static $table = "enrollment";
  public static $columns = ["courseName", "studentUserName", "teacherUserName"];

  /**
 * Enrolls students in courses based on their level and available teachers.
 */
public static function enroll(): void
{
    $students = Students::selectAll();

    foreach ($students as $student) {
        $studentLevel = $student["level"];
        $teachers = Teaches::selectWithLevel($studentLevel);
        $courses = Courses::select(["name"], ["level" => $studentLevel]);
        $studentAdded = false;

        if (empty($teachers)) {
            continue;
        }

        foreach ($courses as $course) {
            $courseAdded = false;

            foreach ($teachers as $teacher) {
                $teacherCourseCount = self::exists(["teacherUserName" => $teacher["teacherUserName"], "courseName" => $course["name"]]);
                $teacherStudentCount = self::exists(["teacherUserName" => $teacher["teacherUserName"], "studentUserName" => $student["userName"], "courseName" => $course["name"]]);
                $teachesCourse = Teaches::doesTeach(["teacherUserName" => $teacher["teacherUserName"], "course" => $course["name"]]);

                echo "{$teacherCourseCount} : {$teacher["teacherUserName"]} : {$course["name"]} :{$teachesCourse} <br>";

                if ($teacherCourseCount >= 5 || $teacherStudentCount === 1 || $teachesCourse === 0) {
                    continue;
                }

                self::insert($course["name"], $student["userName"], $teacher["teacherUserName"]);
                $courseAdded = true;
                break;
            }

            if ($studentAdded) {
                break;
            }

            if ($courseAdded) {
                continue;
            }
        }

        if ($studentAdded) {
            continue;
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
  public static function insert(string $course, string $studentUserName, string $teacherUserName): bool
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

