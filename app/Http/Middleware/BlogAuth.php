<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogAuth
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
        $bid = $request->bid;
        $Blog = Blog::withTrashed()->find($bid);
        if (is_null($Blog)) {
            return abort('404');
        }
        return session('user')['id'] == $Blog->creator_id ? $next($request) : abort('403');
    }
}
