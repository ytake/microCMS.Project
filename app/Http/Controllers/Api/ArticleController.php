<?php
namespace MicroApp\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class ArticleController
 * @package MicroApp\Http\Controllers\Managed
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ArticleController extends BaseController
{

    /**
     * @Get("/articles", as="articles")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function articles()
    {
        return response()->json([]);
    }
}
