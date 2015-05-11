<?php
namespace MicroApp\Http\Controllers\Managed;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class IndexController
 * @package MicroApp\Http\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class IndexController extends BaseController
{

    /**
     * @Get("/managed", as="managed.top")
     * @return \Illuminate\View\View
     */
    public function top()
    {

    }

}
