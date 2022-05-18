<?php
/**
 * User: PaulTung
 * Date: 7/8/2020
 * Time: 9:15 AM
 */

namespace app\models;


use app\mvcCore\DbModel;
use app\mvcCore\UserModel;

/**
 * Class Register
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\models
 */
class User extends UserModel
{
  public int $id = 0;
  public string $firstname = '';
  public string $lastname = '';
  public string $email = '';
  public string $password = '';
  public string $passwordConfirm = '';

  public static function tableName(): string
  {
    return 'tbl_users';
  }
  public static function primaryKey(): string
  {
    return 'user_id';
  }
  public function attributes(): array
  {
    return ['firstname', 'lastname', 'email', 'password'];
  }

  public function labels(): array
  {
    return [
      'firstname' => 'First name',
      'lastname' => 'Last name',
      'email' => 'Email',
      'password' => 'Password',
      'passwordConfirm' => 'Password Confirm'
    ];
  }

  public function rules()
  {
    return [
      'firstname' => [self::RULE_REQUIRED],
      'lastname' => [self::RULE_REQUIRED],
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
        self::RULE_UNIQUE, 'class' => self::class
      ]],
      'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
      'passwordConfirm' => [[self::RULE_MATCH, 'match' => 'password']],
    ];
  }

  public function save()
  {
    $this->password = password_hash($this->password, PASSWORD_DEFAULT);

    return parent::save();
  }

  public function getDisplayName(): string
  {
    return $this->firstname . ' ' . $this->lastname;
  }

  public function getUserLevel(): int
  {
    return $this->firstname . ' ' . $this->lastname;
  }

  public function getUserFunctions(): array
  {
    return $this->firstname . ' ' . $this->lastname;
  }
}