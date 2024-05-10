<?php
require_once ("DB.php");
require_once ("Students.php");
require_once ("Teachers.php");
require_once ("Courses.php");
require_once ("Teaches.php");


class Enrollment
{

  public static $table = "enrollment";
  public static $columns = ["courseName", "courseLevel", "courseHours", "studentUserName", "teacherUserName"];

  /**
   * - should be called upon any registration process
   * Enrolls students in courses based on their level and available teachers.
   */
  public static function enroll(): void
  {
    $students = Students::selectAll();
    // the method will stop if there aren't any students
    if (empty($students)) {
      return ;
    }

    foreach ($students as $student) {
      /**
       * returns an things tha are connected to the students --> coureses and teachers
       */
      $studentLevel = $student["level"];
      $courses = Courses::select(Courses::$columns, ["level" => $studentLevel]);
      $teachers = Teaches::selectWithLevel($studentLevel);
      $coursesForLevel = Courses::select(["name",], ["level" => $studentLevel]);
      $unassinged = true;
      $teacherFound = false;
          // loop through each retunred course
      foreach ($courses as $course) {
      // there aren't any teachers for this course , get the next course
        if (empty($teachers)) {
          self::insert([$course["name"], $course["level"], $course["hours"], $student["userName"], null]);
          continue;
        }

        foreach ($teachers as $teacher) {
          // Check if the teacher teaches the current course and has available slots for the student
          $isTeachingCourse = Teaches::doesTeach(["teacherUserName" => $teacher["teacherUserName"], "course" => $course["name"]]) === 1;
          $teacherCourseCount = self::exists(["teacherUserName" => $teacher["teacherUserName"], "courseName" => $course["name"]]) < 5;
          $alreadyEnrolled = self::exists(["teacherUserName" => $teacher["teacherUserName"], "studentUserName" => $student["userName"], "courseName" => $course["name"]]) === 0;
          $studentCourseCount = self::exists(["studentUserName" => $student["userName"]]) < count($coursesForLevel);
          if (!$isTeachingCourse)
          // get to the next teacher
            continue;
          if (!$teacherCourseCount)
            // get to the next teacher
            continue;
          if (!$alreadyEnrolled)
            // get to the next course
            break;
          if (!$studentCourseCount)
            // get to the next course
            break;
            // this means that the teacher is aviliable
          $teacherFound = true;

          if ($teacherFound) {
            self::insert([$course["name"], $course["level"], $course["hours"], $student["userName"], $teacher["teacherUserName"]]);
            // data is inserted and the students is assinged
            $unassinged = false;
          }
          if (!$teacherFound) {
            // no teacher found at all so insert the value of the teacher username as null
            self::insert([$course["name"], $course["level"], $course["hours"], $student["userName"], null]);
          }
        }
      }

      // Update the null course names
      if ($unassinged && !empty($teachers)) {
        $nullCourses = self::selectNull(["courseName"], ["studentUserName" => $student["userName"]]);
        // return courses that have the teacher column as null
        if (!empty($nullCourses)) {
          // if there are null values loop through each course and assing the teachers
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