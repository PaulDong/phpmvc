<?php
/**
 * User: PaulTung
 * Date: 7/7/2020
 * Time: 10:53 AM
 */

namespace app\mvcCore;


/**
 * Class Response
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package mvcCore
 */
class Response
{
  public function statusCode(int $code)
  {
    http_response_code($code);
  }

  public function redirect($url)
  {
    header("Location: $url");
  }
}