<?php
/**
 * User: PaulTung
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace mvcCore\middlewares;


use mvcCore\Application;
use mvcCore\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package mvcCore
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