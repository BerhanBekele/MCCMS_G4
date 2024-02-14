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
        $name = Auth::user()->name;
        // echo "<b><i>You are logged-in email address:".$email."</i></b>";
        $email=[$email];
        //$name=[$name];
        $viewData=[];
      // $viewData["title"] = "Asigned Cases";
        $viewData["title"] =$name;
        // $viewData["cases"] = Cases::whereIn('email', $email)->get();
        if(Auth::user()->role_id==3){
        $viewData["cases"] = Cases::whereIn('email', $email)->join('judge', 'cases.judge_id', '=', 'judge.id')
                                    ->join('clients', 'clients.id', '=', 'cases.client_id')
                                    ->join('court', 'cases.court_id', '=', 'court.id')
                                    ->join('lawyer', 'cases.lawyer_id', '=', 'lawyer.id')
                                    ->select('cases.*', 'judge.judge_name', 'court.court_name','lawyer.lawyer_name','clients.client_name')
                                    ->get();
      }
      else{
    //   $viewData["cases"] = Cases::join('clients', 'clients.id', '=', 'cases.client_id')
    //                 ->select('cases.*','clients.client_name')->get();
    //                     }
        $viewData["cases"] = Cases::join('judge', 'cases.judge_id', '=', 'judge.id')
                        ->join('clients', 'clients.id', '=', 'cases.client_id')
                        ->join('court', 'cases.court_id', '=', 'court.id')
                        ->join('lawyer', 'cases.lawyer_id', '=', 'lawyer.id')
                        ->select('cases.*', 'judge.judge_name', 'court.court_name','lawyer.lawyer_name','clients.client_name')
                        ->get();
                    }
        $viewData["client"] = Client::all();
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
