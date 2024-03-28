<?php
class Enrollment
{

  public static $table = "enrollment";
  public static $columns = ["studentId", "courseId", "teacherId"];

  public static function select(array $data): array
  {
    return DB::select(self::$table, $data);
  }
  public static function selectAll(array $data, array $columns)
  {
    return DB::selectAll(self::$table, $columns, $data);
  }
}

