<?php
/**
 * User: PaulTung
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\mvcCore;

use app\mvcCore\middlewares\BaseMiddleware;
/**
 * Class Controller
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package mvcCore
 */
class Controller
{
  public string $layout = 'main';
  public string $action = '';

  /**
   * @var app\mvcCore\BaseMiddleware[]
   */
  protected array $middlewares = [];

  public function setLayout($layout): void
  {
    $this->layout = $layout;
  }

  public function render($view, $params = []): string
  {
    return Application::$app->router->renderView($view, $params);
  }

  public function registerMiddleware(BaseMiddleware $middleware)
  {
    $this->middlewares[] = $middleware;
  }

  /**
   * @return app\mvcCore\middlewares\BaseMiddleware[]
   */
  public function getMiddlewares(): array
  {
    return $this->middlewares;
  }
}