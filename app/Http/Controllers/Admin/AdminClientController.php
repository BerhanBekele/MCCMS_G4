<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminClientController extends Controller
{
    public function index(){
        $viewData=[];
        $viewData["title"] = "Created Cases";
        $viewData["client"] = Client::all();
        return view('admin.case.index')->with("viewData",$viewData);

    }
    public function show($id){
            $viewData = [];
            $viewData["title"] = "Online Case Client information";
            $viewData["subtitle"] ="Client information";
            $viewData["client"] = Client::findOrFail($id);
            return view('admin.client.show')->with("viewData", $viewData);

   }
}
