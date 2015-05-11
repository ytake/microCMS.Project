<?php
namespace MicroApp\Repositories\Eloquent;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * Class User
 * @package MicroApp\Repositories\Eloquent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class User extends Model implements AuthenticatableContract
{

    use Authenticatable;

    /** @var string */
    protected $table = 'users';

    /** @var bool  */
    public $incrementing = false;

    /** @var string  */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'token'];

    /**
     * @var array
     */
    protected $hidden = ['remember_token'];

}
