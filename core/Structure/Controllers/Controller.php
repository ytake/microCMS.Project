<?php
namespace microCms\Controllers;

/**
 * Class Controller
 * @package microCms\Controllers
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

    /**
     * @param $template
     * @param array $attributes
     * @param null $path
     * @return \Illuminate\View\View
     */
    protected function view($template, array $attributes = [], $path = null)
    {
        $path = (is_null($path)) ? null : "{$path}.{$template}";
        return \View::make($path, $attributes);
    }
}
