<?php
namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entry
 * @package App\Repositories\Eloquent
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Entry extends Model
{

    /** @var string */
    protected $table = 'entries';

    /** @var array  */
    protected $fillable = ['slug', 'body'];

    /** @var array  */
    protected $guarded = ['entry_id'];
}
