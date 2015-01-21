<?php
namespace microCms\Middleware;

use microCms\Requests\ResponseTrait;

/**
 * Class ValidatorMiddleware
 * @package microCms\Middleware
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ValidatorMiddleware extends AbstractMiddleware
{

    use ResponseTrait;

    /** @var array  */
    protected $exclude = [
        '_token',
        "q"
    ];

    /**
     * @return $this
     */
    public function filter()
    {
        if(\Input::get('_return')) {
            return \Redirect::route($this->redirectForm())->withInput();
        }
        return \Event::fire('request.validate', [\Input::except($this->exclude)], true);
    }

}
