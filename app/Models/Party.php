<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='parties';
    protected $primeryKey   = 'id';

public function Cases(){
    return $this->hasMany('App\Models\Cases');
}

}
