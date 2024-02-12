<?php

namespace App\Http\Controllers\Admin;
use App\Models\Cases;
use App\Models\Court;
use App\Models\Judge;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminCaseController extends Controller
{
    public function clientCases(){

        $email = Auth::user()->email;
        $name = Auth::user()->name;
        echo "<b><i>You are logged-in user name:".$name."</i></b>";
        $email=[$email];
        $viewData=[];
        $viewData["title"] = "Created Cases";
        $viewData["cases"] = Cases::whereIn('email', $email)->get();
        return view('admin.case.index')->with("viewData",$viewData);

    }
    public function index(){
        $viewData=[];
        $viewData["title"] = "Created Cases";
        $viewData["cases"] = Cases::all();
        $viewData["client"] = Client::join('Cases', 'cases.client_id', '=', 'id')
                ->select('cases.*', 'clients.client_name as client_name')->get();
        return view('admin.case.index')->with("viewData",$viewData);

    }

    public function asign(){
        $viewData=[];
        $viewData["title"] = "Created Cases";
        //$viewData["cases"] = Cases::all();
        $viewData["cases"] = Cases::join('judge', 'cases.judge_id', '=', 'judge.id')
                                  ->join('court', 'cases.court_id', '=', 'court.id')
        ->select('cases.*', 'judge.judge_name as judge_name', 'court.court_name as court_name')
        ->get();
        $viewData["client"] = Client::all();

        return view('admin.case.asign')->with("viewData",$viewData);
    }

    public function create(){
        $viewData=[];
        $viewData["title"] = "Create New Case";
        return view('admin.case.create')->with("viewData",$viewData);
    }

public function save(Request $request){
    Cases::validate($request);
    $newCase=new Cases();
    $newCase->case_type=$request->input('case_type');
    $newCase->case_description=$request->input('case_description');
    $newCase->email=$request->input('email');
    $newCase->client_id=$request->input('client_id');
    $newCase->case_status='Pending';
    $newCase->save();
    return redirect()->route('admin.case.index');

    }

    public function edit($id){

        $viewData=[];
        $viewData["title"] = "Admin Page - Admin - Online Cases ";
        $viewData["case"] = Cases::with('judge')->findOrFail($id);
        $viewData["case"] = Cases::with('court')->findOrFail($id);
        $viewData["judge"] = Judge::all();
        $viewData["court"] = Court::all();
        return view('admin.case.edit')->with("viewData",$viewData);

    }

    public function update(Request $request,$id){
        Cases::validate($request);
        $case=Cases::findOrFail($id);
        $case->case_status=$request->input('case_status');
        $case->judge_id=$request->input('judge_id');
        $case->court_id=$request->input('court_id');
        $case->updated_at=$request->input('updated_at');
        $case->save();
        return redirect()->route('admin.case.asign');

        }
public function delete($id){
            Cases::destroy($id);
            return back();
    }
}
