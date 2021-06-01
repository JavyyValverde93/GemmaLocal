<?php

namespace App\Http\Middleware;

use App\Models\Rolespermiso;
use App\Models\Permiso;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Perm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permiso)
    {
        try{
            // $perm = Rolespermiso::where('id_permiso', Permiso::where('nombre', $permiso)
            // ->first()->id)->where('id_rol', Auth::user()->rol->id)->first();
            // if($perm==null){
            //     return back()->with('error', 'No tienes permiso para acceder a esta sección');
            // }
            return $next($request);
        }catch(\Exception $ex){
            return back()->with('error', 'No tienes permiso para acceder a esta sección');
        }
    }
}
