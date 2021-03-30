<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicenceController extends Controller
{

    public function index(){


        $f = null;
        $localDir = dirname(sys_get_temp_dir());
        $MeroSoftDir = $localDir . '\\Mero Soft';
        $ProjectDir = $MeroSoftDir . '\\' . config('app.name');


        if (file_exists($ProjectDir . '\\' . config('app.name') . '.li')){
                return redirect('/');
        }


        if (file_exists($ProjectDir . '\\' . config('app.name') . '.li')){
            $file = fopen($ProjectDir . '\\' . config('app.name') . '.li', 'r');
            $f = fread($file, 200);

            fclose($file);

        }




        return view('licence.make',compact('f'));
    }

    public function registerLicence(Request $request){

        $localDir = dirname(sys_get_temp_dir());
        $MeroSoftDir = $localDir . '\\Mero Soft';
        $ProjectDir = $MeroSoftDir . '\\' . config('app.name');

        if (!file_exists($MeroSoftDir)) {
            mkdir($MeroSoftDir);
        }

        if (!file_exists($ProjectDir)) {
            mkdir($ProjectDir);
        }

        if ($request->has('date')){
            $data =  Carbon::make(  $request->get('date') );
        }else{
            $data =  Carbon::now();
        }

        if (!file_exists($ProjectDir . '\\' . config('app.name') . '.li')){
            $file = fopen($ProjectDir . '\\' . config('app.name') . '.li', 'w');
            $f = fwrite($file, $data, 200);
            fclose($file);
        }



        return redirect('/');
    }
}
