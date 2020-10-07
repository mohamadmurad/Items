<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTD extends Model
{
    use HasFactory;
    protected $table = 'MTD';
    protected $with = [
        'Color',
        'Size',
        'MTS',
    ];

    public function MTI()
    {
        return $this->belongsTo('App\Models\MTI','ComputerNo');
    }


    public function Color()
    {
        return $this->belongsTo('App\Models\Colors','ColorID','ColorID');
    }

    public function Size()
    {
        return $this->belongsTo('App\Models\Sizes','SizeID','SizeID');
    }


    public function MTS(){
        return $this->hasMany('App\Models\MTS', 'Code', 'Code');
    }


    public function scopeFilterData($query,$request){
        $columns = [
            'BarCode',

        ];


        foreach ($columns as $column){
            $col_request = $request->get($column);

            if (!empty($col_request)){

                if ($col_request !== '0'){
                    $query->where($column,'=', $col_request);
                }

            }
        }

        return $query;
    }
}
