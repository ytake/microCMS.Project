<?php
namespace microCms\Structure\Controllers;

/**
 * Class HomeController
 * @package microCms\Structure\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HomeController extends Controller
{


    public function index()
    {
        return \View::make('hello');
    }

}
