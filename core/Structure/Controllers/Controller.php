<?php
namespace microCms\Structure\Controllers;

/**
 * Class Controller
 * @package microCms\Structure\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Controller extends \Illuminate\Routing\Controller
{

    /** @var null  */
    protected $layout = null;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = \View::make($this->layout);
        }
    }

    /**
     * view 描画
     * @param string $path
     * @param array $data
     * @return \Illuminate\View\View
     */
    protected function view($path, $data = [])
    {
        $this->layout->content = \View::make($path, $data);
    }

    /**
     * @param null $string
     * @return void
     */
    protected function title($string = null)
    {
        $title = ($string) ? " | $string" : null;
        $title = \Config::get('system.title') . $title;
        \View::inject('title', e(str_replace(["\r\n","\r","\n"], '', $title)));
    }

    /**
     * @param null $string
     * @return void
     */
    protected function description($string = null)
    {
        $description = ($string) ? " | $string" : null;
        \View::inject('description', e(str_replace(["\r\n","\r","\n"], '', $description)));
    }

}
