<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 10:13 AM
 */

namespace app\mvcCore;

use app\mvcCore\db\DbModel;

/**
 * Class UserModel
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\mvcCore
 */
abstract class UserModel extends DbModel
{
  abstract public function getDisplayName(): string;
  abstract public function getUserFunctions(): array;
  abstract public function getUserLevel(): int;
}