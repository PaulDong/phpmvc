<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 11:43 AM
 */

namespace app\mvcCore\exception;


/**
 * Class NotFoundException
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\mvcCore\exception
 */
class NotFoundException extends \Exception
{
  protected $message = 'Page not found';
  protected $code = 404;
}