<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function Log($mensaje){
        $log = new Log();
        $log->id_usuario = Auth::user()->id;
        $log->accion = $mensaje;
        $log->fecha_creacion = now()->getTimestamp();
        $log->save();
}
}
