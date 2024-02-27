<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminClientController extends Controller
{
    public function index(){
        $viewData=[];
        $viewData["title"] = "Created Client";
        $viewData["client"] = Client::all();
        return view('admin.client.index')->with("viewData",$viewData);

    }
    public function create(){
        $viewData=[];
        $viewData["title"] = "Created Client";
        $viewData["client"] = Client::all();
        return view('admin.client.create')->with("viewData",$viewData);

    }
    public function show($id){
            $viewData = [];
            $viewData["title"] = "Online Case Client information";
            $viewData["subtitle"] ="Client information";
            $viewData["client"] = Client::findOrFail($id);

            return view('admin.client.show')->with("viewData", $viewData);

   }
   public function clientName(){
    $r_id=[3];
    $viewData=[];
    $viewData["title"] = "Created Cases";
    $viewData["clients"] = Client::all();
    $viewData["users"] =User::whereIn('role_id',array(3))->get();
    return view('admin.case.create')->with("viewData",$viewData);

}
   public function save(Request $request){
    //Client::validate($request);
    $newClient=new Client();
    $newClient->client_name=$request->input('client_name');
    $newClient->dob=$request->input('dob');
    $newClient->sex=$request->input('sex');
    $newClient->client_address=$request->input('client_address');
    $newClient->phone_number=$request->input('phone_number');
    $newClient->client_photo='client_photo.gpg';
   $newClient->save();
    if( $request->hasFile('client_photo') ){
        $imageName = $newClient->client_name.'.'.$request->file('client_photo')->extension();
        Storage::disk('public')->put($imageName,
                        file_get_contents($request->file('client_photo')->getRealPath()));
        $newClient->client_photo = $imageName;
        $newClient->save();
    }
    notify()->success("Client Added successfully", " MCCMS");
    return redirect()->route('admin.client.index');

    }
}
