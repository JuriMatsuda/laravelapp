<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = [
          ['name' => 'Taro', 'mail' => 'taro@yamada'],
          ['name' => 'Hanako', 'mail' => 'hanako@flower'],
          ['name' => 'Sachiko', 'mail' => 'sachiko@happy'],
        ];

        // $request->merge(配列 )
        $request->merge(['data' => $data]);
        return $next($request);
    }
}
