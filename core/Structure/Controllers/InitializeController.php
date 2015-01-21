<?php
namespace microCms\Controllers;

/**
 * Class InitializeController
 * @package microCms\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class InitializeController extends Controller
{


    public function index()
    {
        return \View::make('pages.index');
    }

}
