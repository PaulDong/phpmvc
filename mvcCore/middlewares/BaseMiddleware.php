<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace app\mvcCore\middlewares;


/**
 * Class BaseMiddleware
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\mvcCore
 */
abstract class BaseMiddleware
{
  abstract public function execute();
}