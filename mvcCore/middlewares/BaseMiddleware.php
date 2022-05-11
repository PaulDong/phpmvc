<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace mvcCore\middlewares;


/**
 * Class BaseMiddleware
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package mvcCore
 */
abstract class BaseMiddleware
{
  abstract public function execute();
}