<?php

namespace App\Http\Middleware;

use App\Models\Formation;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UserFormationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        try {
            if (auth()->check() && Formation::where('id', $request->route()->parameter('formation'))
                    ->where('user_id', auth()->id())->firstOrFail()) {
                return $next($request);
            }
        } catch (ModelNotFoundException $e) {}
        return abort(403);
    }
}
