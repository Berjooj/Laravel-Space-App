<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\Response;

class Cors {

    public function handle($request, Closure $next) {
        return $next($request)
            ->header('access-control-allow-origin', 'http://localhost:8080')
            ->header('Access-Control-Allow-Origin', 'http://localhost:8080')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Authorization, X-Requested-With, Application');
    }
}
