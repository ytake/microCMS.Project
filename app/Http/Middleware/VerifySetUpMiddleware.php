<?php
namespace MicroApp\Http\Middleware;

use Closure;

/**
 * Class VerifySetUpMiddleware
 * @package MicroApp\Http\Middleware
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class VerifySetUpMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!env('CMS_SETUP', false)) {
            return redirect()->route('setup');
        }
        return $next($request);
    }

}
