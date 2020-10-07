<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTI extends Model
{
    use HasFactory;
    protected $table = 'MTI';


    public function MTD(){
        return $this->hasMany('App\Models\MTD', 'ComputerNo', 'ComputerNo');
    }


    public function scopeFilterData($query,$request){
        $columns = [
            'ModelNo',
            'ComputerNo',
            'BrandID',
            'ItemID',
            'CountryID',
            'DeptID',
            'TypeID',
            'FabricID',
            'SeasonID',
            'ItemYear',

        ];


        foreach ($columns as $column){
            $col_request = $request->get($column);

            if (!empty($col_request)){

                if ($col_request !== '0'){
                    $query->where('MTI.'.$column,'=', $col_request);
                }

            }
        }

        return $query;
    }
}
