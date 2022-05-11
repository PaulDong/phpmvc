<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 11:35 AM
 */

namespace mvcCore\exception;


use mvcCore\Application;

/**
 * Class ForbiddenException
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package mvcCore\exception
 */
class ForbiddenException extends \Exception
{
  protected $message = 'You don\'t have permission to access this page';
  protected $code = 403;
}