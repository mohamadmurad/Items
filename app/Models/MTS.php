<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTS extends Model
{
    use HasFactory;
    protected $table = 'MTS';
    protected $with = [
        'Branches',
    ];
    public function MTD()
    {
        return $this->belongsTo('App\Models\MTD','Code');
    }


    public function Branches()
    {
        return $this->belongsTo('App\Models\Branches','BranchID','BranchID');
    }
}
