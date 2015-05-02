<?php
namespace MicroApp\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package MicroApp\Http\Controllers\Api
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Controller extends BaseController
{

    /**
     * @Get("/", as="index", middleware="setup")
     */
    public function index()
    {

    }

    /**
     * @Get("/setup", as="setup")
     */
    public function setup()
    {
        return view('setup');
    }
}
