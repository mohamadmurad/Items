<?php

namespace App\Http\Middleware;

use Carbon\Traits\Date;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class CheckLicence
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
        $localDir = dirname(sys_get_temp_dir());
        $MeroSoftDir = $localDir . '\\Mero Soft';
        $ProjectDir = $MeroSoftDir . '\\' . config('app.name');

        if (!file_exists($ProjectDir . '\\' . config('app.name') . '.li')){
            Artisan::call('down --secret="153759"');
            return $next($request);
        }else{
            Artisan::call('up');
            return $next($request);

        }

    }
}
