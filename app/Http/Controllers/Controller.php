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
     * Show the Index Page
     * @Get("/", as="index")
     */
    public function index()
    {

    }

    /**
     * Show the Index Page
     * @Get("/setup", as="setup")
     */
    public function setup()
    {

    }
}
