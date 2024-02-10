<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cases;
use App\Models\Court;
use App\Models\Judge;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminJudgeController extends Controller
{
    public function index(){
        $viewData=[];
        $viewData["title"] = "Admin Page -Admin - Online Cases ";
        return view('admin.judge.index')->with("viewData",$viewData);
    }

    public function asignedCases(){
        $email = Auth::user()->email;
        // echo "<b><i>You are logged-in email address:".$email."</i></b>";
        $email=[$email];
        $viewData=[];
        $viewData["title"] = "Asigned Cases";
        $viewData["cases"] = Cases::whereIn('email', $email)->get();
        $viewData["client"] = Client::all();

//         $viewData["cases"] = Cases::join('judge', 'cases.judge_id', '=', 'judge.id')
//         ->join('court', 'cases.court_id', '=', 'court.id')
// ->select('cases.*', 'judge.judge_name as judge_name', 'court.court_name as court_name')
// ->get();

        return view('admin.judge.asignedCases')->with("viewData",$viewData);

    }
    public function editCase($id){

        $viewData=[];
        $viewData["title"] = "Admin Page - Admin - Online Cases ";
        $viewData["case"] = Cases::findOrFail($id);
        // $viewData["case"] = Cases::with('court')->findOrFail($id);
        // $viewData["judge"] = Judge::all();
        // $viewData["court"] = Court::all();
        return view('admin.judge.editCases')->with("viewData",$viewData);

    }
    public function updateCase(Request $request,$id){
        echo "case updated!";
        //Cases::validate($request);
        $case=Cases::findOrFail($id);
        $case->case_type=$request->input('case_type');
        $case->case_description=$request->input('case_description');
        $case->created_at=$request->input('created_at');
        $case->save();
        return redirect()->route('admin.judge.asignedCases');

        }
}
