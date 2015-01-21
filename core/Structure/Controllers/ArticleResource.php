<?php
namespace microCms\Controllers;

/**
 * Class ArticleResource
 * @package microCms\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ArticleResource extends Controller
{


    public function index()
    {
        return \View::make('pages.article.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return $this->view('article.create', [], 'pages');
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
