<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;
    protected $table='lawyer';
    protected $primeryKey   = 'id';
    protected $fillable = [
        'lawyer_name',
    ];
public function Cases(){
    return $this->hasMany('App\Models\Cases');
}
public function Court(){
    return $this->hasMany('App\Models\Court');
}
}
