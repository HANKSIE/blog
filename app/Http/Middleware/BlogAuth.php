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
        $Blog = Blog::find($bid);
        return session('user')['id'] == $Blog->creator_id ? $next($request) : abort('403');
    }
}
