<?php
/**
 * User: PaulTung
 * Date: 7/10/2020
 * Time: 9:19 AM
 */

namespace app\mvcCore\db;

use app\mvcCore\Application;
use app\mvcCore\Model;

/**
 * Class DbModel
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\mvcCore
 */
abstract class DbModel extends Model
{
  abstract public static function tableName(): string;

  public static function primaryKey(): string
  {
      return 'id';
  }

  public function save()
  {
    $tableName = $this->tableName();
    $attributes = $this->attributes();
    $params = array_map(fn($attr) => ":$attr", $attributes);
    $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
            VALUES (" . implode(",", $params) . ")");
    foreach ($attributes as $attribute) {
      $statement->bindValue(":$attribute", $this->{$attribute});
    }
    $statement->execute();
    return true;
  }

  public function update($where)
  {
    $tableName = $this->tableName();
    $attributes = $this->attributes();
    $conditions = array_keys($where);
    $statement = self::prepare("UPDATE $tableName SET ".implode(",", $attributes."=:$attributes" )."
            WHERE ".implode("AND", array_map(fn($condition) => "$condition = :$condition", $conditions)).";");
    foreach ($attributes as $attribute) {
      $statement->bindValue(":$attribute", $this->{$attribute});
    }
    foreach ($where as $key => $item) {
      $statement->bindValue(":$key", $item);
    }
    $statement->execute();
    return true;
  }

  public static function prepare($sql): \PDOStatement
  {
    return Application::$app->db->prepare($sql);
  }

  public static function findOne($where)
  {
    $tableName = static::tableName();
    $attributes = array_keys($where);
    $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
    $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
    foreach ($where as $key => $item) {
      $statement->bindValue(":$key", $item);
    }
    $statement->execute();
    return $statement->fetchObject(static::class);
  }

  public static function getAll($where)
  {
    $tableName = static::tableName();
    if(is_array($where)) {
      $attributes = array_keys($where);
      $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
      $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
      foreach ($where as $key => $item) {
        $statement->bindValue(":$key", $item);
      }
    } else {
      $statement = self::prepare("SELECT * FROM $tableName");
    }
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  // column name or expression and where conditions
  public static function getOneColumn($column, $where)
  {
    if(isset($column)) {
      $tableName = static::tableName();
      if(is_array($where)) {
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT $column FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
          $statement->bindValue(":$key", $item);
        }
      } else {
        $statement = self::prepare("SELECT $column FROM $tableName");
      }
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_COLUMN, 0);
    } else {
      return false;
    }
  }
}