<?php

namespace App\Http\Middleware;

use Closure;

class ProjectExportables
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
      if(!auth()-> check()){
        return redirect('/admin');
      }
      if(auth()-> user()-> role_id != \App\User::ADMIN){
        return redirect('/admin');
      }
      return $next($request);
    }
}
