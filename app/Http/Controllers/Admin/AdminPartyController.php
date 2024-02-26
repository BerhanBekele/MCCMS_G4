<?php

namespace App\Http\Controllers\Admin;

use index;
use App\Models\Cases;
use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPartyController extends Controller
{
    //
    public function index($id){
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["parties"] = Party::findOrFail($id);
        return view('admin.party.index')->with("viewData",$viewData);

    }
    public function showParties($id){
        echo "case_id".$id;
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["parties"] = Party::where('case_id',$id)->get();
        return view('admin.party.show')->with("viewData",$viewData);

    }
    public function create(){
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["parties"] = Party::all();
        return view('admin.party.create')->with("viewData",$viewData);

    }
    public function SearchCase($id){
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["cases"] = Cases::findOrFail($id);
        return view('admin.party.create')->with("viewData",$viewData);

    }

   public function save(Request $request){
    //Party::validate($request);
    $newParty=new Party();
    $newParty->case_id=$request->input('case_id');
    $newParty->party_type=$request->input('party_type');
    $newParty->party_name=$request->input('party_name');
    $newParty->dob=$request->input('dob');
    $newParty->sex=$request->input('sex');
    $newParty->educ_level=$request->input('educ_level');
    $newParty->party_address=$request->input('party_address');
    $newParty->phone_number=$request->input('phone_number');

   $newParty->save();
    notify()->success("Party Added  successfully", " MCCMS");
    //return back();
    return redirect()->route('admin.case.index');

    }
    public function edit($id){
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["party"] = Party::findOrFail($id);
        // notify()->success("Party Added  successfully", " MCCMS");
        return view('admin.party.edit')->with("viewData",$viewData);

    }
    public function update(Request $request,$id){
        //Party::validate($request);
        $party=Party::findOrFail($id);
        $party->party_type=$request->input('party_type');
        $party->party_name=$request->input('party_name');
        $party->dob=$request->input('dob');
        $party->sex=$request->input('sex');
        $party->educ_level=$request->input('educ_level');
        $party->party_address=$request->input('party_address');
        $party->phone_number=$request->input('phone_number');
        $party->save();
        notify()->success("Party updated  successfully", " MCCMS");

        return $this->showParties($request->case_id);



        }
public function delete($id){
            Party::destroy($id);
            notify()->success("Party Deleted  successfully", " MCCMS");
            return back();
    }
}
