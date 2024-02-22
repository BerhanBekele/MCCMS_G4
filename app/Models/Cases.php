<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cases extends Model
{
    use HasFactory;

    public static function validate($request){
        $request->validate([
           // "case_description"=>"required|max:2000",
          //  "case_status"=> "required",
            // "case_type"=> "required",
           //"email"=> "required",
        ]);
    }
    public function judge(){
        return $this->belongsTo(Judge::class);
    }

    public function Court(){
        return $this->belongsTo(Court::class);
    }
    public function Lawyer(){
        return $this->belongsTo(Lawyer::class);
    }
    public function Party(){
        return $this->belongsTo(Cases::class);
    }
}
