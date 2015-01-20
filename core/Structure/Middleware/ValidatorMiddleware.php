<?php
namespace microCms\Structure\Middleware;

/**
 * Class RequestMiddleware
 * @package App\Middleware
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ValidatorMiddleware extends AbstractMiddleware
{

    use \microCms\Structure\Requests\ResponseTrait;

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
