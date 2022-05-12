<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace app\mvcCore\middlewares;


use app\mvcCore\Application;
use app\mvcCore\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\mvcCore
 */
class AuthMiddleware extends BaseMiddleware
{
  protected array $actions = [];

  public function __construct($actions = [])
  {
    $this->actions = $actions;
  }

  public function execute()
  {
    if (Application::isGuest()) {
      if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
        throw new ForbiddenException();
      }
    }
  }
}