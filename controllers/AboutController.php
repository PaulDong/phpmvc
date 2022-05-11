<?php
/**
 * User: PaulTung
 * Date: 7/8/2020
 * Time: 8:56 AM
 */

namespace app\controllers;


use mvcCore\Controller;

/**
 * Class AboutController
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\controllers
 */
class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}