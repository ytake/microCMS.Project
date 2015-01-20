<?php
namespace microCms\Structure\Validators;

/**
 * Class ValidatorTrait
 * @package microCms\Structure\Validators
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
trait ValidatorTrait
{

    /** @var array */
    protected $errors;

    /**
     * @param array $attributes
     * @param string $key
     * @return bool
     */
    public function validate(array $attributes, $key)
    {
        $validate = \Validator::make($attributes, $this->rules[$key]);
        if ($validate->passes()) {
            return true;
        }
        $this->setErrors($validate->messages());
        return false;
    }

    /**
     * Set error messages
     * @var \Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param null $name
     * @return array
     */
    public function getRule($name = null)
    {
        if(is_null($name)) {
            return $this->rules;
        }
        return $this->rules[$name];
    }
}
