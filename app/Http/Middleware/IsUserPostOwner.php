<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Closure;

class IsUserPostOwner
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
        $postExists = isset( $request->post );

        if( $postExists ){
            $user_id = Auth::id();
            $postOwnerId = $request->post->user_id;

            if( isset( $request->user_id ) )
                $request->request->remove('user_id');

            if( $postOwnerId == $user_id )
                return $next($request);
        }


        return response("você está tentando alterar uma postagem que não lhe pertence", 401);
    }
}
