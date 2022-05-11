<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 10:13 AM
 */

namespace mvcCore;

use mvcCore\db\DbModel;

/**
 * Class UserModel
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package mvcCore
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}