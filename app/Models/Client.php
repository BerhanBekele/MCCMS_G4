<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public static function validate($request){
        $request->validate([
            "client_name"=>"required|max:255",
            "client_address"=> "required",
            "dob"=> "required",
            "sex"=> "required",
            "phone_number"=> "required",
            'client_photo'=>'image',
        ]);
    }
    protected $table='clients';

    protected $primeryKey   = 'id';


      public  function getId(){
        return $this->id;
       }
       public  function getClient_name(){
        return $this->client_name;
       }
       public  function getclient_address(){
        return $this->client_address;
       }
       public  function getDob(){
        return $this->dob;
       }
       public  function getSex(){
        return $this->sex;
       }
       public  function cases(){
        return $this->belongsTo(Cases::class);

       }
}
