<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        $viewData=[];
        $viewData["title"] = "Admin Page -Admin - Online Cases ";
        return view('admin.home.index')->with("viewData",$viewData);
    }
}
