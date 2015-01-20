<?php
namespace microCms\Structure\Dispatcher;

use microCms\Structure\Requests\ResponseTrait;
use microCms\Structure\Validators\ValidatorTrait;
use microCms\Structure\Validators\ValidateRuleTrait;

/**
 * Class ValidateDispatcher
 * @package microCms\Structure\Dispatcher
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ValidateDispatcher extends AbstractDispatcher
{

    use ValidateRuleTrait, ValidatorTrait, ResponseTrait;

    /**
     * @param array $data
     * @param array $append
     * @return $this
     * @throws \Exception
     */
    public function handle(array $data, array $append = [])
    {
        $rule = $this->getRule();
        $current = \Route::currentRouteName();
        $diff = array_diff(\Request::segments(), explode('.', $current));

        if(array_has($rule, $current)) {
            $validate = $this->validate($data, $current);

            if(!$validate) {
                $target = $this->redirectForm();
                if(\Route::getRoutes()->hasNamedRoute($target)) {
                    return \Redirect::route($target, $diff)
                        ->withErrors($this->getErrors())
                        ->withInput();
                }
                throw new \Exception;
            }
        }
    }

}
