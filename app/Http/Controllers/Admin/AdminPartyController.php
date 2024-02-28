<?php

namespace App\Http\Controllers\Admin;

use index;
use App\Models\Cases;
use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class AdminPartyController extends Controller
{
    //
    public function index($id){
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["parties"] = Party::findOrFail($id);
        return view('admin.party.index')->with("viewData",$viewData);

    }
    public function audio($id){
        echo $id;
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["party"] = Party::findOrFail($id);
        return view('admin.party.audioRecord')->with("viewData",$viewData);

    }
    public function showParties($id){
        // echo "case_id".$id;
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
    $newParty->party_word=$request->input('party_word');

   $newParty->save();
   if($request->hasFile('audio_record') ){
    $audioRecord = $newParty->audio_record.'.'.$request->file('audio_record')->extension();
    Storage::disk('public')->put($audioRecord,
                    file_get_contents($request->file('audio_record')->getRealPath()));
    $newParty->audioRecord = $audioRecord;
    $newParty->save();
}
    notify()->success("Party information Added  successfully", " MCCMS");
    //return back();
    return redirect()->route('admin.case.index');

    }
    public function edit($id){
        $viewData=[];
        $viewData["title"] = "Created Party";
        $viewData["party"] = Party::findOrFail($id);
        return view('admin.party.edit')->with("viewData",$viewData);

    }
    public function update(Request $request,$id){
        //Party::validate($request);
        // $request->validate([
        //     'audio_record' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav',
        // ]);
        echo $request->input('audio_record');
        $party=Party::findOrFail($id);
        $party->party_type=$request->input('party_type');
        $party->party_name=$request->input('party_name');
        $party->dob=$request->input('dob');
        $party->sex=$request->input('sex');
        $party->educ_level=$request->input('educ_level');
        $party->party_address=$request->input('party_address');
        $party->phone_number=$request->input('phone_number');
        $party->party_word=$request->input('party_word');
        $party->audio_record=$party->party_name.'_'.'audio_record.wav';
        // $party->audio_record=$request->party_name . '_audio_record_' . time() . '.' . $request->file('audio_record')->extension();
        $party->save();

        // if($request->hasFile('audio_record') ){
        //     $audioRecord = $party->party_name.'_audio_record.'.$request->file('audio_record')->extension();
        //     Storage::disk('public')->put($audioRecord,
        //                     file_get_contents($request->file('audio_record')->getRealPath()));
        //     $party->audioRecord = $audioRecord;
        //     $party->save();
        // }



      if ($request->hasFile('audio_record')) {
            // Generate a unique filename
            $filename = $request->party_name . '_audio_record_' . time() . '.' . $request->file('audio_record')->extension();

            // Store the file on the 'public' disk
            Storage::disk('public')->put($filename, file_get_contents($request->file('audio_record')->getRealPath()));

            // Save the file path to your model or wherever necessary
            $party->audioRecord = $filename;
            $party->save();
            notify()->success("Party information updated  successfully", " MCCMS");
         }
         else notify()->warning("There is no audio_record", " MCCMS");
        //  //

        return $this->showParties($request->case_id);



        }
public function delete($id){
            Party::destroy($id);
            notify()->success("Party Deleted  successfully", " MCCMS");
            return back();
    }

    public function audioRecord(Request $request){

        $audioFile = $request->file('audio');

        if ($audioFile->isValid()) {
            $path = Storage::putFile('audio', $audioFile);

            // TODO: Save the audio file path to the database
            return $this->showParties($request->case_id)->with('success', 'Audio recorded and stored successfully.');
            //return redirect('/')->with('success', 'Audio recorded and stored successfully.');
        }
        return $this->showParties($request->case_id);
    //return view('record');
}
}
