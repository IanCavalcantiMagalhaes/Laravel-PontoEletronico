<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Usuario;
class LoginBlock
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
        

        $RS=
        User::where('id',$request->id);
         if($RS===null){
            return redirect('home');
         }
         return $next($request);
    }
}
https://laravel.com/docs/5.6/middleware