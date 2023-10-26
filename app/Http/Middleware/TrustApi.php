<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrustApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // header("Access-Control-Allow-Origin: *");
        header_remove('Access-Control-Allow-Credentials');
        // header_remove('Access-Control-Allow-Origin');
        // header_remove('Access-Control-Allow-Methods');
        // header_remove('Access-Control-Allow-Headers');

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: *");

        // $headers = [
        //     'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        //     'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        // ];
        // if ($request->getMethod() == "OPTIONS" || "GET") {
        //     return response('OK')
        //         ->withHeaders($headers);
        // }

        return $next($request);
        // $response = $next($request);
        // foreach ($headers as $key => $value)
        //     $response->header($key, $value);
        // return $response;
    }
}
