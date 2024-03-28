<?php

namespace App\Http\Middleware\Added;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Layout
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        config(['livewire.layout' => 'components.layouts.base']);
        return $next($request);
    }
}
